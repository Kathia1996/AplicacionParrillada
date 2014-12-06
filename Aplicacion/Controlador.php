<?php
use mvc\Repositorio\MainRepositorie;
abstract class Controlador {

    protected $_vista;

    abstract public function index();

    public function __construct() {
        $this->_vista = new Vista(new Request());
    }

    public function Select($p) {
        $this->MainRepositorie = new MainRepositorie();      
        $this->MainRepositorie->table = $p['table'];
        $data = array();
        $data['rows'] = $this->MainRepositorie->getList();
        $data['name'] = $p['name'];
        $data['class'] = $p['class'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
        $data['disabled'] = $p['disabled'];
        $data['value'] = $p['value'];
        $data['option'] = $p['option'];
        $this->_vista->renderizarPartial('main/_Select',$data);
    }

    protected function loadModel($modelo) {
        $ruta = ROOT . 'mvc' . DS . 'Entidades' . DS . $modelo . '.php';
        if (is_readable($ruta)) {
            require_once $ruta;
            $modelo = new $modelo;
            return $modelo;
        } else {
            throw new Exception('error de modelo');
        }
    }

}
