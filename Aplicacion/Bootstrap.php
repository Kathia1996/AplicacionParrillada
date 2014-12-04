<?php
/*
 * procesa la llamada a los controladores y metodos
 */
class Bootstrap
{

    public static function run(Request $request)
    {
        $controlador = $request->getControlador() . 'Controlador';

        //creamos la ruta del controlador
        $rutaControlador = ROOT . 'controlador' . DS . $controlador . '.php';

        $metodo = $request->getMetodo();
        /*echo $rutaControlador;
        exit;*/

        $argumentos = $request->getArgumentos();

        //verificamos si es accesible
        if (is_readable($rutaControlador)) {
            require_once $rutaControlador;

            $controlador = new $controlador;

            //verificamos si el metodo es valido
            if (is_callable(array($controlador, $metodo))) {
                $metodo = $request->getMetodo();
            } else {
                $metodo = 'index';
            }

            //verificamos los argumentos
            if (isset($argumentos)) {
                call_user_func_array(array($controlador, $metodo), $argumentos);
            } else {
                call_user_func(array($controlador, $metodo));

            }
        }else{
            throw new \Exception('No encontrado');
        }
    }
} 