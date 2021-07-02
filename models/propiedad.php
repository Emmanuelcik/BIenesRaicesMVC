<?php

namespace Model;

use GuzzleHttp\Psr7\Query;

class Propiedad extends ActiveRecord{
    protected static $columnasDB = ["id", "titulo", "precio", "imagen", "descripcion", "habitaciones", "wc", "estacionamiento", "creado", "vendedorId"];

    protected static $tabla = "propiedades";

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? NULL;
        $this->titulo = $args["titulo"] ?? "";
        $this->precio = $args["precio"] ?? "";
        $this->imagen = $args["imagen"] ?? "";
        $this->descripcion = $args["descripcion"] ?? "";
        $this->habitaciones = $args["habitaciones"] ?? "";
        $this->wc = $args["wc"] ?? "";
        $this->estacionamiento = $args["estacionamiento"] ?? "";
        $this->creado = date("Y/m/d");
        $this->vendedorId = $args["vendedorId"] ?? null;
    }

    public function validar(){
        if(!$this->vendedorId){
            self::$errores[] = "Debes elegir el vendedor";
        }
        if(!$this->imagen){
            self::$errores[] = "La imagen es obligatoria";
        } 
        if(!$this->titulo){
            self::$errores[] = "Debes añadir titulo";
        }
        if(!$this->precio){
            self::$errores[] = "El precio es obligatorio";
        }
        if(!$this->descripcion){
            self::$errores[] = "La descipcion es obligatoria";
        }
        if(!$this->habitaciones){
            self::$errores[] = "el numero de habitacion es obligatorio";
        }
        if(!$this->wc){
            self::$errores[] = "el numero de wc es obligatorio";
        }
        if(!$this->estacionamiento){
            self::$errores[] = "el numero de estacionamientos es obligatorio";
        }
        
        return self::$errores;
    }
}