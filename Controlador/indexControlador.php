<?php
//require_once '/lib/View.php';
use mvc\Repositorio\SystemaRepositorie;
class indexControlador extends Controlador
{

    public function __construct()
    {
        parent::__construct();
    }

    //metodo para llamar al controller index
//    public function index()
//    {
//        $this->_vista->setJs(array('jquery-1.11.1.min','jquery-ui.min','bootstrap.min','jquery.dataTables.min','funcion'));
//        $this->_vista->setCss(array('jquery-ui.min','bootstrap-theme.min','bootstrap.min','jquery.dataTables.min','jquery.dataTables_themeroller','nuevo'));
//        $this->_vista->titulo = 'Portada de index';
//        $this->_vista->renderizar('index');
//    }
       public function index(){
        $data=array();
        $this->SystemaRepositorie = new SystemaRepositorie();
        $data['menu']= $this->Menu();
//        $this->set_template_layout("layout_body","layout",$data);
        $this->_vista->setJs(array('jquery-1.11.1.min','jquery-ui.min','bootstrap.min','jquery.dataTables.min','funcion'));
        $this->_vista->setCss(array('jquery-ui.min','bootstrap-theme.min','bootstrap.min','jquery.dataTables.min','jquery.dataTables_themeroller','nuevo'));
        $this->_vista->titulo = 'Portada de index';
        $this->_vista->renderizar('index',$data);
    }

    public function Menu()
    {
         $data= array();
        $this->SystemaRepositorie = new SystemaRepositorie();      
//        print_r(json_encode($this->Sistema->menus()));
        $menu_data=$data['menu']=$this->SystemaRepositorie->menus();
        return $menu_start=$this->SystemaRepositorie->menu_start($menu_data);
//        $this->load->view("menu",$data);
    }

} 