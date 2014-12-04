<?php

define('DS', DIRECTORY_SEPARATOR); // guardamos '/'
define('ROOT', realpath(dirname(__FILE__)) . DS); //ruta raiz de nuestra aplicacion
define('APP_PATH', ROOT . 'Aplicacion' . DS); // ruta del directorio de las aplicaciones
define('BASE_DATOS', ROOT . 'basedatos' . DS);

try {
//aqui incluimos todos los archivos de la aplicación
    require_once APP_PATH . 'Config.php';
    require_once APP_PATH . 'Request.php';
    require_once APP_PATH . 'Bootstrap.php';
    require_once APP_PATH . 'Controlador.php';
    require_once APP_PATH . 'Modelo.php';
    require_once APP_PATH . 'Vista.php';
    //require_once BASE_DATOS . 'conexion.php';
    //require_once BASE_DATOS . 'Config.php';
    require_once ROOT.'vendor'.DS.'autoload.php';

    require_once BASE_DATOS . 'Config.php';

    //require_once BASE_DATOS . 'Main.php';
    //session::init();

    //FrontController::main(new request);

    /*PRUEBA DEL REQUEST
     * $r = new \Aplicacion\Request();

    echo $r->getControlador() . '<br/>';
    echo $r->getMetodo() . '<br/>';
    print_r($r->getArgumentos());*/

    Bootstrap::run(new Request());

} catch (Exception $e) {
    echo($e->getMessage());
}

