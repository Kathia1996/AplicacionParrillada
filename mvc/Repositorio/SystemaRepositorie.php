<?php

namespace mvc\Repositorio;

use Illuminate\Database\Capsule\Manager as Capsule;
use mvc\Entidades\Systema;
use mvc\Entidades\view_menupadres;
use mvc\Entidades\view_menuhijos;

class SystemaRepositorie {
    
function menus()
    {
    
$items = view_menupadres::where('idperfil', '=', '1')->get(); 
//  foreach ($items as $valor) {
//            echo $valor->descripcion;
//            echo "<br>";
//        }

//        $items = $this->db->query("select * from view_menupadres where idperfil ='".$_SESSION['idperil']."'");
//        $items= $items->result(); 
        
        $cont = 0;
        $cont2 = 0;
        foreach ($items as $valor)
        {
//            $hijos = $this->db->query("select * from view_menuhijos where idpadre=".$valor->idmodulo." and idperfil='".$_SESSION['idperil']."'");
//            $hijos= $hijos->result(); 
$hijos = view_menuhijos::where('idpadre', '=', $valor->idmodulo) ->where('idperfil', '=', 1)->get(); 
            if($valor->url=="") {$url = "#";}
                else {$url = $valor->url;}
            $menu[$cont] = array(
            'texto' => $valor->descripcion,
            'url' => $url,
            'icon' => $valor->icono,
            'enlaces' => array()
                );
            $cont2 = 0;
            foreach($hijos as $h)
            {
              $menu[$cont]['enlaces'][$cont2] = array('idmodulo'=>$h->idmodulo,'texto' => $h->descripcion, 'icon' => $h->icono,'url' => $h->url);
              $cont2 ++;
            }
            $cont ++;
        }

        return $menu;
    }
    function menu_start($menu){
        ///menu php
       $m= '<ul class="nav navbar-nav">';
//    echo "<pre>";print_r($menu);exit;
    foreach ($menu as $key => $value) {
        $tam_submenus = count($value['enlaces']);
        if ($tam_submenus == 0) {//solo cuando no tienen hijos

           $m=$m.'<li>';
            $m=$m."<a onclick=javascript:cargar_pages('".$value[url]."'); >";
                   $m=$m.' <i class=" icon-cog  '.$value['icon'].'"></i>';
                    $m=$m.'<span class="menu-text">&nbsp '.$value['texto'].'</span>';
            $m=$m.'</a>';
           $m=$m.'</li>';
        } else { $valoridmodulo=$value['texto'];
            $m=$m.'<li id="mod_'.$value['texto'].'">';//dando valor al id del modulo
                $m=$m.'<a href="#" class="dropdown-toggle">';
                    $m=$m.'<i class="'.$value['icon'].'"></i>';
                    $m=$m.'<span class="menu-text">'.$value['texto'].'</span>';

                    $m=$m.'<b class="arrow icon-angle-down"></b>';
                $m=$m.'</a>';
                $m=$m.'<ul class="submenu">';
                    $sub = $value['enlaces'];
                    foreach ($sub as $key => $value) {
                        $m=$m.'<li validmod="mod_'.$valoridmodulo.'" class="mod_li">';//agregando validmod y class
                            $m=$m.'<a onclick=javascript:cargar_pages("'.$value['url'].'","'.$value['idmodulo'].'"); style="cursor:pointer;">';
                                $m=$m.'<i class="icon-double-angle-right"></i>';
                               $m=$m.$value['texto'];
                            $m=$m.'</a>';
                        $m=$m.'</li>';
                    }

                $m=$m.'</ul>';
            $m=$m.'</li>';
        }
    }

$m=$m.'</ul>';
return $m;
        //fin menu php
    }
    public function getAll()
    {
        //$datos = Users::all();


        $datos = Capsule::table('users')->get();
        return $datos;
    }

    public function updated()
    {
        $curso = Cursos::find(2);
        $curso->descripcion = "historia";
        $curso->save();
    }

    public function deleted()
    {
        $curso = Cursos::find(2);
        $curso->deleted();
    }
} 