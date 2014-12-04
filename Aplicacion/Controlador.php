<?php

abstract class Controlador
{
    protected $_vista;

    abstract public function index();

    public function __construct()
    {
        $this->_vista = new Vista(new Request());
    }


    protected function loadModel($modelo)
    {
        $ruta = ROOT . 'mvc'.DS.'Entidades' . DS . $modelo . '.php';
        if (is_readable($ruta)) {
            require_once $ruta;
            $modelo = new $modelo;
            return $modelo;
        } else {
            throw new Exception('error de modelo');
        }
    }
}