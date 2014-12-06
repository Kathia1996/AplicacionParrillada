<?php

namespace mvc\Repositorio;

use Illuminate\Database\Capsule\Manager as Capsule;
use mvc\Entidades\Usuarios;

class UsuariosRepositorie {

    function startt() {
//        $sql="SELECT usuario.idusuario as idusuario,
//        CONCAT_WS(' ',administrador.nombres,administrador.apellidos) as nombres,
//        usuario.usuario AS usuario,
//        usuario.clave AS contrasenia,
//        perfil.descripcion AS perfil,
//        perfil.idperfil
//        FROM usuario INNER JOIN perfil ON usuario.idperfil = perfil.idperfil
//        INNER JOIN administrador ON administrador.idusuario = usuario.idusuario
//        WHERE usuario.usuario = '" . $_POST['Usuario'] . "' AND  usuario.clave = '" . $_POST['Contrasena'] . "'";
        $data = Capsule::table('usuario')
                ->select('usuario.idusuario as idusuario', 'nombres as nombres', 'usuario.usuario AS usuario', 'usuario.clave AS contrasenia', 'perfil.descripcion AS perfil', 'perfil.idperfil')
                ->join('perfil', 'usuario.idperfil', '=', 'perfil.idperfil')
                ->join('administrador', 'administrador.idusuario', '=', 'usuario.idusuario')
                ->where('usuario', '=', $_POST['Usuario'])
                ->where('usuario.clave', '=', $_POST['Contrasena'])
                ->get();
//        $items = $this->db->query("");
//        $items = $items->result();

        return array('flag' => count($data), 'obj' => $data);
    }

    public function getAll() {
        //$datos = Users::all();


        $datos = Capsule::table('users')->get();
        return $datos;
    }

    public function updated() {
        $curso = Cursos::find(2);
        $curso->descripcion = "historia";
        $curso->save();
    }

    public function deleted() {
        $curso = Cursos::find(2);
        $curso->deleted();
    }

}

?>