<?php

namespace mvc\Entidades;

use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    protected $table = 'trabajador';
    protected $primaryKey = 'idtrabajador';
    protected $timestamp = false;
    
} 
?>
