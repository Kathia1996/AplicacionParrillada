<?php
class indexControlador extends Controlador
{

    public function __construct()
    {
        parent::__construct();
    }

    //metodo para llamar al controller index
    public function index()
    {
        $this->_vista->setJs(array('funcion','jquery-1.11.1.min','jquery-ui.min','bootstrap.min','jquery.dataTables.min'));
        $this->_vista->setCss(array('nuevo','jquery-ui.min','bootstrap-theme.min','bootstrap.min','jquery.dataTables.min','jquery.dataTables_themeroller'));
        $this->_vista->titulo = 'Portada de index';
        $this->_vista->renderizar('index');
    }

} 