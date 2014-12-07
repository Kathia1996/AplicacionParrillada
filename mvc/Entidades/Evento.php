<?php

namespace mvc\Entidades;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';
    protected $primaryKey = 'idevento';
    protected $timestamp = false;
    
} 
?>
