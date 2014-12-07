<?php

namespace mvc\Repositorio;

use Illuminate\Database\Capsule\Manager as Capsule;
use mvc\Entidades\Evento;

class Tipo_PagoRepositorie {
//SELECT
//tipo_pago.descripcion,
//tipo_pago.idtipopago
//FROM
//tipo_pago


    function select() {
        $data = Capsule::table('tipo_pago')
                ->select('tipo_pago.idtipopago','tipo_pago.descripcion')
                ->get();
//        print_r($data);exit;
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