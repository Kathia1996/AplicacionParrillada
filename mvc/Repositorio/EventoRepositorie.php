<?php

namespace mvc\Repositorio;

use Illuminate\Database\Capsule\Manager as Capsule;
use mvc\Entidades\Evento;

class EventoRepositorie {
    function select() {
//        $query="SELECT
//evento.descripcion_evento,
//cliente_mayor.nombres,
//evento.fecha_evento,
//evento.direccion
//FROM
//evento
//INNER JOIN cliente_mayor ON idclientemayor = cliente_mayor.idclientemayor";
// print_r(Capsule::select($query));
        $data = Capsule::table('evento')
                ->select('evento.idevento','evento.descripcion_evento as descripcion','cliente_mayor.nombres','evento.fecha_evento','evento.direccion')
                ->join('cliente_mayor', 'idclientemayor', '=', 'cliente_mayor.idclientemayor')
                ->get();
//        print_r($data);exit;
//        $items = $this->db->query("");
//        $items = $items->result();
        return $data;
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