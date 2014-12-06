<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 17/10/14
 * Time: 05:23 PM
 */
use mvc\Repositorio\UsuariosRepositorie;
class usuariosControlador extends Controlador{

    protected $userRepo;

    public function __construct()
    {
        parent::__construct();
    }
       function login() {
        $this->UsuariosRepositorie = new UsuariosRepositorie();      
         $_p =$this->UsuariosRepositorie->startt();
        $obj = $_p['obj'];
//       echo  $obj[0]['usuario'];
//        print_r($obj);exit;
        $resp=array();
        if ($obj[0]['usuario'] != '') {
            $_SESSION['user'] = $obj[0]['usuario'];
            $_SESSION['name'] = $obj[0]['nombres'];
            $_SESSION['idperfil'] = $obj[0]['idperfil']; 
            $_SESSION['perfil'] = $obj[0]['perfil'];  
            $_SESSION['idusuario'] = $obj[0]['idusuario']; 
            $resp = array("rep" => 1, "msg" => "datos Correctos");
        } else {
         $smg="<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span><span class='sr-only'>Error:</span> Datos Incorrectos!!</div>";
            $resp = array("rep" => 2, "msg" => $smg);
        }
       
        print_r(json_encode($resp));
    }
    function  logout(){
        session_destroy();
        
        print_r(json_encode(array("rep"=>"ok","url"=>BASE_URL)));
    }

    public function index()
    {
        $this->userRepo = new UsersRepositorie();
        echo '<pre>';
        var_dump( $this->userRepo->getAll());
        exit;
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

    public function nuevo()
    {
        //$datos = $_POST;
        $datos = [
            "usuario" => "juan",
            "apellidos"=> "juan"
        ];

        $bol = $this->_users->add($datos);
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
?>