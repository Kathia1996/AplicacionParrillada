<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 17/10/14
 * Time: 05:23 PM
 */
use mvc\Repositorio\EventoRepositorie;
use mvc\Repositorio\Tipo_PagoRepositorie;
use mvc\Repositorio\GrillaRepositorie;
use mvc\Repositorio\MainRepositorie;
class eventoControlador extends Controlador{

    protected $userRepo;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
//        $data=array();
//        $data['SemestreAcademico'] = $this->Select(array('id' => 'cliente', 'name' => 'cliente','class'=>'chzn-select', 'table' => 'cliente', 'code' => $semestreUltimo, 'value' => 'idcliente', 'option' => 'nombres_apellidos'));
//        echo "soy el controlador y luego voy a cargar mi vista".'<br>';
//        $ev= new EventoRepositorie();
//        $tp= new Tipo_PagoRepositorie();
//        $data['tipo_pago']= $tp->select();
//        $data['eventos']=$ev->select();
//        $this->_vista->renderizarPartial('index',$data);
         if (!isset($_GET['p'])) {
            $_GET['p'] = 1;
        }//envia p=1 para que se habilite la opcion nuevo en el procedimiento almacenado
        if (!isset($_GET['q'])) {
            $_GET['q'] = "";
        }
        if (!isset($_GET['order'])) {
            $_GET['order'] = "";
        }
        $obj = new MainRepositorie();
        $grilla = new GrillaRepositorie();
        $data = array();
        $cabecera = $obj->getHead('evento');
        $data['data'] = $obj->index_P($_GET['q'], $_GET['p'], $cabecera, "evento", $_GET['order']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows' => $data['data']['rowspag'], 'url' => 'evento/index', 'query' => $_GET['q'], 'order' => $_GET['order']));
        $_GET['id']='1';
        $obj->session($_GET['id']);
        $titulo = 'Eventos registrados';
        $data['grilla'] = $grilla->asign($titulo, 'evento', $cabecera, $data['data']['rows'], $_GET['p'], $data['pag'], $data['data']['total'], false, false);
        $data['controller'] ='evento';
//        $view = new View();
//        $view->setData($data);
//        $view->setTemplate('view/master/grilla.php');
//        echo $view->renderPartial();
        $this->_vista->renderizarPartial('main/grilla',$data);
    }
     public function search() {         print_r($_REQUEST);
     $obj = new MainRepositorie();
       $grilla = new GrillaRepositorie();
        $columnas = $obj->getHead('evento');
        $data = array();
//        $view = new View();
        $data['value'] = $obj->Search_P($_GET["term"], $columnas, "evento");
        $data['num'] = $columnas;
//        $view->setData($data);
//        $view->setTemplate('view/_Json_view2.php');
//        echo $view->renderPartial();
          $this->_vista->renderizarPartial('main/_Json_view2',$data);
    }
    public function nuevo()
    {
        //$datos = $_POST;
//        $datos = [
//            "usuario" => "juan",
//            "apellidos"=> "juan"
//        ];
//        $bol = $this->_users->add($datos);
        echo "entre a nuevo";
        $this->_vista->renderizarPartial('nuevo');
    }
    
    public function show($id)
    {
        $datos = $this->_users->show($id);

    }

    public function editar($id)
    {
        //$datos = $_POST;
        $datos = [
            "usuario" => "juan",
            "apellidos"=> "juan"
        ];

        $bol = $this->_users->update($datos,$id);
        echo $bol;
        exit;
    }



    public function eliminar($id)
    {
        $bol = $this->_users->destroy($id);
        echo $bol;
        exit;
    }
} 