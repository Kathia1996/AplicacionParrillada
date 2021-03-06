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

    public function renderizar($vista, $item = "")
    {
        $v=$vista;
        $vista=explode("/",$vista);
        if(count($vista)>=2){$ruta = ROOT . 'Vistas' . DS .  $v . '.php';}
        else{ $ruta = ROOT . 'Vistas' . DS . $this->_controlador . DS . $vista[0] . '.php';}
        $js = array();
        $css = array();
//         $item = array();
      
        if (count($this->_js)) {
            $js = $this->_js;
        }
        if (count($this->_css)) {
            $css = $this->_css;
        }
         ob_start();
        @extract( $item, EXTR_OVERWRITE );//para enviar datos
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
    public function renderizarPartial($vista, $item = "")
    {        
//        echo "aki<pre>";print_r($item);exit;
        $v=$vista;
        $vista=explode("/",$vista);
        if(count($vista)>=2){$ruta = ROOT . 'Vistas' . DS .  $v . '.php';}
        else{ $ruta = ROOT . 'Vistas' . DS . $this->_controlador . DS . $vista[0] . '.php';}
        $js = array();
        $css = array();
//         $item = array();
      
        if (count($this->_js)) {
            $js = $this->_js;
        }
        if (count($this->_css)) {
            $css = $this->_css;
        }
         ob_start();
        @extract( $item, EXTR_OVERWRITE );//para enviar datos
        $_params = array(
            'ruta_css' => BASE_URL . 'lib/css/',
            'ruta_js' => BASE_URL . 'lib/js/',
            'ruta_img' => BASE_URL . 'lib/img/',
            'js' => $js,
            'css' => $css
        );


        if (is_readable($ruta)) {
            include_once $ruta;
        } else {
            throw new Exception('Error de vista no encontrada');
        }
    }
    public function renderizar_principal($vista, $item = false)
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
            include_once ROOT.'Vistas'.DS.'cabecera_principal.php';
            include_once $ruta;
            include_once ROOT.'Vistas'.DS.'pie_principal.php';
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