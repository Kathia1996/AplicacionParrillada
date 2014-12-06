<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 17/10/14
 * Time: 05:23 PM
 */
use mvc\Repositorio\UsersRepositorie;
class eventoControlador extends Controlador{

    protected $userRepo;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['SemestreAcademico'] = $this->Select(array('id' => 'cliente', 'name' => 'cliente','class'=>'chzn-select', 'table' => 'cliente', 'code' => $semestreUltimo, 'value' => 'idcliente', 'option' => 'nombres_apellidos'));
        echo "soy el controlador y luego voy a cargar mi vista";
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