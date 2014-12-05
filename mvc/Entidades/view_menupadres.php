<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 31/10/14
 * Time: 04:54 PM
 */
namespace mvc\Entidades;

use Illuminate\Database\Eloquent\Model;

class view_menupadres extends Model
{
    protected $table = 'view_menupadres';
    protected $primaryKey = 'idmodulo';
    protected $timestamp = false;
    
}