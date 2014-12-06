<?php

namespace mvc\Repositorio;

use Illuminate\Database\Capsule\Manager as Capsule;
//use mvc\Entidades\Main;


class MainRepositorie  {

    function  getList(){
        $data=Capsule::table($this->table)->get();
//        $curso = Capsule::table($this->table)->all();      echo "<pre>";  print_r($curso);exit;
        return $data;
    }
} 