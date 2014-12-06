<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 31/10/14
 * Time: 04:54 PM
 */
namespace mvc\Entidades;

use Illuminate\Database\Eloquent\Model;

class view_menuhijos extends Model
{
    protected $table = 'view_menuhijos';
    protected $primaryKey = 'idmodulo';
    protected $timestamp = false;
    public function er(){
    }
}