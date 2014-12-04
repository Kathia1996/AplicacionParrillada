<?php

class Vista
{
    private $_controlador;
    private $_js;
    private $_css;

    public function __construct(Request $request)
    {
        $this->_controlador = $request->getControlador();
    }

    public function renderizar($vista, $item = false)
    {

        $ruta = ROOT . 'Vistas' . DS . $this->_controlador . DS . $vista . '.php';
        $js = array();
        $css = array();
        if (count($this->_js)) {
            $js = $this->_js;
        }
        if (count($this->_css)) {
            $css = $this->_css;
        }
        $_params = array(
            'ruta_css' => BASE_URL . 'lib/css/',
            'ruta_js' => BASE_URL . 'lib/js/',
            'ruta_img' => BASE_URL . 'lib/img/',
            'js' => $js,
            'css' => $css
        );


        if (is_readable($ruta)) {
            include_once ROOT.'Vistas'.DS.'cabecera.php';
            include_once $ruta;
            include_once ROOT.'Vistas'.DS.'pie.php';
        } else {
            throw new Exception('Error de vista no encontrada');
        }
    }

    public function setJs(array $js) {
        if (is_array($js) && count($js)) {
            for ($i = 0; $i < count($js); $i++) {
                $this->_js[] = BASE_URL . 'Vistas/' . $this->_controlador . "/js/" . $js[$i] . '.js';
            }
        } else {
            throw new Exception('Error de js');
        }
    }
    public function setCss(array $css) {
        if (is_array($css) && count($css)) {
            for ($i = 0; $i < count($css); $i++) {
                $this->_css[] = BASE_URL . 'Vistas/' . $this->_controlador . "/css/" . $css[$i] . '.css';
            }
        } else {
            throw new Exception('Error de css');
        }
    }
} 