<?php
define("TEMPLATES_URL", __DIR__ . "/templates");
define("FUNCIONES_URL", __DIR__ . "funciones.php");
define("CARPETA_IMAGENES", __DIR__ . "/../imagenes/");

function incluirTemplate( string $nombre, bool $inicio = false){
    
    include TEMPLATES_URL . "/{$nombre}.php";
}

function autenticado () {
    session_start();
    if(!$_SESSION["loged"]){
        header("Location: /");
    }
}

function debugear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}
function validarTipo($tipo){
    $tipos = ["vendedor", "propiedad"];

    return in_array($tipo, $tipos);
}
function mostrarNotificacion($codigo){
    $mensaje = "";

    switch($codigo){
        case 1:
            $mensaje = "Creado Correctamente";
            break;
        case 2:
            $mensaje = "Actualizado Correctamente";
            break;
        case 3:
            $mensaje = "Elimienado Correctamente";
            break;
        default :
            $mensaje = false;
            break;
    }
    return $mensaje;
}