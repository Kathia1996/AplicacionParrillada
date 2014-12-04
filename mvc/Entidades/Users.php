<?php
/**
 * Created by PhpStorm.
 * User: Investigación2
 * Date: 31/10/14
 * Time: 04:54 PM
 */
namespace mvc\Entidades;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $timestamp = false;
} 