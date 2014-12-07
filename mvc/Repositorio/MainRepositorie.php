<?php

namespace mvc\Repositorio;

use Illuminate\Database\Capsule\Manager as Capsule;

//use mvc\Entidades\Main;


class MainRepositorie {

    public $db;
    public $rows = 10;
    protected $pag = 5;
    protected $exec;

    function getList() {
        $data = Capsule::table($this->table)->get();
//        $curso = Capsule::table($this->table)->all();      echo "<pre>";  print_r($curso);exit;
        return $data;
    }

    public function getHead($tabla) {

        $query = "SHOW COLUMNS FROM " . $tabla . " FROM appa;";
        $data = Capsule::select($query);
        $fields = array();
        foreach ($data as $rows) {
            array_push($fields, $rows['Field']);
        }
        return $fields;
    }

    public function Search_P($query, $condicion, $table) {
        $query = '%' . $query . '%';
        $sql = "select * from " . $table;
        $filtro = " where ";
        $i = 0;
        while ($i < count($condicion)) {
            if ($i == (count($condicion) - 1)) {
                $filtro.=" " . $condicion[$i] . "  like  '" . ($query) . "'   ";
            } else {
                $filtro.=" " . $condicion[$i] . "  like  '" . ($query) . "' or  ";
            }
            $i++;
        }
        $filtro.=" ";
        $sql.=$filtro . " ORDER BY " . $condicion[0] . " ASC";
        // $statement = $this->db->prepare($sql);
        // $statement->execute();
        // return $statement->fetchAll();
        return Capsule::select($sql);
    }

    public function index_P($query, $p, $condicion, $table, $order) {      // $query = '%'.$query.'%';
        $sql = "select * from " . $table;
        $filtro = " where ";
        $i = 0;
        foreach ($condicion as $k) {
            $i++;

            if ($i == count($condicion)) {
                $filtro.="$k  like  '%" . ($query) . "%' ";
            } else {
                $filtro.="$k  like  '%" . ($query) . "%' or  ";
            }
        }
        $filtro.=" ";
        //   $sql.=$filtro;
        if ($order == "") {
            $sql.=$filtro . " ORDER BY " . $condicion[0] . " DESC";
        } else {
            $sql.=$filtro . " ORDER BY " . $order . " ASC";
        }

        $data['total'] = $this->getTotal($sql);
        $data['rows'] = $this->getRow($sql, $p);
        $data['rowspag'] = $this->getRowPag($data['total'], $p);
        return $data;
        // return $sql;
    }

    public function session($id) {
        // echo ''.$id;
        if ($id != null) {
            $_SESSION['modulo_cod'] = $id;
        }
        $sql = "SELECT * FROM permiso WHERE idperfil=" . $_SESSION['idperfil'] . " and idmodulo=" . $_SESSION['modulo_cod'];
//echo $sql;exit;
        $data = Capsule::select($sql);

        foreach ($data as $k) {
            $_SESSION['editar'] = $k['editar'];
            $_SESSION['delete'] = $k['eliminar'];
            $_SESSION['insertar'] = $k['anadir'];
            $_SESSION['acceder'] = $k['acceder'];
        }
    }

    /* --------------------- */

    public function getTotal($sql) {
        $data = Capsule::select($sql);
//        echo "<pre>";print_r($data);exit;
        return count($data);
    }

    public function getRow($sql /* , $param */, $p) {
        $p = $this->rows * ($p - 1);

        $sql = $sql . " LIMIT {$this->rows} OFFSET {$p} ";

        return Capsule::select($sql);
    }

    public function getRowPag($total_rows, $vp) {
        $data = array();
        if (ceil($total_rows / $this->rows) <= $this->pag) {
            for ($x = 1; $x <= ceil($total_rows / $this->rows); $x++) {
                if ($x == $vp) {
                    $data[] = array('active' => 1, 'type' => 1, 'value' => $x);
                } else {
                    $data[] = array('active' => 0, 'type' => 1, 'next' => 0, 'value' => $x);
                }
            }
        } else {
            $flag = TRUE;
            if (ceil($total_rows / $this->rows) % $this->pag != 0) {
                for ($j = ceil($total_rows / $this->rows); $j >= $this->pag; $j--) {
                    if ($j % $this->pag == 0) {
                        if ($vp > $j) {
                            $flag = FALSE;
                            for ($x = $j + 1; $x <= ceil($total_rows / $this->rows); $x++) {
                                if ($x == $j + 1) {
                                    $data[] = array('active' => 0, 'type' => 2, 'value' => $x - 1);
                                }
                                if ($x == $vp) {
                                    $data[] = array('active' => 1, 'type' => 1, 'value' => $x);
                                } else {
                                    $data[] = array('active' => 0, 'type' => 1, 'value' => $x);
                                }
                            }
                            break;
                        } else {

                            break;
                        }
                    }
                }
                if ($flag) {
                    for ($x = $vp; $x <= ceil($total_rows / $this->rows); $x++) {
                        if (( $x % $this->pag ) == 0) {
                            if ($x - $this->pag <= 0) {
                                $z = 1;
                            } else {
                                $z = ($x - $this->pag) + 1;
                            }
                            for ($y = $z; $y <= ($x); $y++) {
                                if ($y > $this->pag && $y == $z) {
                                    $data[] = array('active' => 0, 'type' => 2, 'value' => $y - 1);
                                }
                                if ($y == $vp) {
                                    $data[] = array('active' => 1, 'type' => 1, 'value' => $y);
                                } else {
                                    $data[] = array('active' => 0, 'type' => 1, 'value' => $y);
                                }
                                if ($y == $x && $y != ceil($total_rows / $this->rows)) {
                                    $data[] = array('active' => 0, 'type' => 3, 'value' => $y + 1);
                                }
                            }
                            break;
                        }
                    }
                }
            } else {
                for ($x = $vp; $x <= ceil($total_rows / $this->rows); $x++) {
                    if (( $x % $this->pag ) == 0) {
                        if ($x - $this->pag <= 0) {
                            $z = 1;
                        } else {
                            $z = ($x - $this->pag) + 1;
                        }
                        for ($y = $z; $y <= ($x); $y++) {
                            if ($y > $this->pag && $y == $z) {
                                $data[] = array('active' => 0, 'type' => 2, 'value' => $y - 1);
                            }
                            if ($y == $vp) {
                                $data[] = array('active' => 1, 'type' => 1, 'value' => $y);
                            } else {
                                $data[] = array('active' => 0, 'type' => 1, 'value' => $y);
                            }
                            if ($y == $x && $y != ceil($total_rows / $this->rows)) {
                                $data[] = array('active' => 0, 'type' => 3, 'value' => $y + 1);
                            }
                        }
                        break;
                    }
                }
            }
        }
        return $data;
    }

    public function getnum() {
        return $this->rows;
    }

}
