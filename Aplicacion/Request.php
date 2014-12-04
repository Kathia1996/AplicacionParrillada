<?php

/*
 * recibe y procesa la petición
 */
class Request
{

    private $_controlador;
    private $_metodo;
    private $_argumentos;
    private static $fefault_metodo = 'index';

    public function __construct()
    {
        //preguntamos si hay un parametro get url
        if (isset($_GET['url'])) {

            //devuelve el parametro filtrado
            $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);


            $url = explode('/', $url);

            //limpia el arreglo
            $url = array_filter($url);
            //extrae el primer elemento y lo guarda en controlador
            $this->_controlador = strtolower(@array_shift($url));

            $this->_metodo = strtolower(@array_shift($url));

            $this->_argumentos = $url;
        }


        if (!$this->_controlador) {
            //controlador por defecto
            $this->_controlador = DEFAULT_CONTROLLER;
        }

        if (!$this->_metodo) {
            //metodo defacult
            $this->_metodo = self::$fefault_metodo;
        }

        if (!$this->_argumentos) {
            $this->_argumentos = array();
        }
    }

    public function getControlador()
    {
        return $this->_controlador;
    }

    public function getMetodo()
    {
        return $this->_metodo;
    }

    public function getArgumentos()
    {
        return $this->_argumentos;
    }
} 