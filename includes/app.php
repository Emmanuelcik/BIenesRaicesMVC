<?php 
require "funciones.php";
require "config/database.php";
require __DIR__ . "/../vendor/autoload.php";
use App\ActiveRecord;

//conectar a la db 
$db = conectarDB();

ActiveRecord::setDB($db);
