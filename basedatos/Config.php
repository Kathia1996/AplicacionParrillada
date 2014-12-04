<?php

//Luego importamos y declaramos una nueva Capsule, que nos
//permitirá configurar el uso de la biblioteca por fuera de Laravel

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

//Acá llenamos el array con los datos de configuración
//de nuestra BD
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'appa',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

