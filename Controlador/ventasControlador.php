<?php

/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 17/10/14
 * Time: 05:12 PM
 */
class ventasControlador extends Controlador
{
    protected $_vista;
    protected $_cursos;


    public function __construct()
    {
        parent::__construct();
        $this->_vista = $this->loadModel('ventas');
        $this->_cursos = $this->loadModel('Cursos');

    }

    public function index()
    {
        echo $this->_cursos->listar();
    }

    public function nuevo()
    {
        echo 'ventas/nuevo';
    }

    public function editar($id)
    {
        echo $id;
    }
} 