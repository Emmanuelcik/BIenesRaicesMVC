<?php 

namespace Model;

class ActiveRecord {
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = "";
    protected static $errores = [];
    //Validacion

    //definir la conexion a la bd
    public static function setDB($database) {
        self::$db = $database;
    }

    public function guardar() {
        if( ! is_null ($this->id) ){
            $this->actualizar();
        }else{
            $this->crear();
        }
    }

    public function crear() {

        //sanitizar los datos 
        $atributos = $this->sanitizarAtributos();
        // debugear($atributos);

        $query = "INSERT INTO " . static::$tabla .  " ( ";
        $query .= join(', ' , array_keys($atributos)); 
        $query .=" ) VALUES ('";
        $query .= join("', '", array_values($atributos)); 
        $query .= "') ";
        
        $resultado = self::$db->query($query);
       
        if($resultado){
            header("Location: /admin?resultado=1");
        }
    }

    public function actualizar(){
        $atributos = $this->sanitizarAtributos();

        $valores = [];
        foreach($atributos as $key => $value){
            $valores[] = "{$key}='${value}'";
        }
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(", ", $valores);
        $query .= " WHERE id = '" . self::$db->escape_string( $this->id ) . "' ";
        $query .= "LIMIT 1";
        $resultado = self::$db->query($query);
        if($resultado){
            header("Location: /admin?resultado=2");
        }
    }

    public function eliminar(){
        $query = "DELETE FROM " . static::$tabla . " where id= " . self::$db->escape_string($this->id);
        $resultado = self::$db->query($query);
        if($resultado){
            $this->borrarImagen();
            header("Location: /admin?resultado=3");
        }
    }
    
    //identifica y une los atributos de la base de datos.
    public function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if($columna === "id" ) continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //metodo validacion
    public static function getErrores(){
        return static::$errores;
    }

    //subida de archivos
    public function setImage($imagen){
        if ( ! is_null( $this->id ) ){
            $this->borrarImagen();
        }
        //asignar al atributo de imagen el nombre de la imagen
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    public function borrarImagen(){
        $existe = file_exists(CARPETA_IMAGENES . $this->imagen);
        if($existe){
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }
    
    public function validar(){
        static::$errores = [];
        return static::$errores;
    }
    //lista todas las propiedaes
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
    
        return $resultado;
        
    }
    //Obtiene un numero determinado de registros
    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);
        
        
        return $resultado;
    }
    //Busca una propiedad por su id
    public static function find($id){
        $query = "SELECT * FROM " . static::$tabla . " where id = ${id}";

        $resultado = self::consultarSQL($query);
        return (array_shift( $resultado) );
    }

    public static function consultarSQL($query){
        //consultar la bd
        $resultado = self::$db->query($query);

        //iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){

            $array[] = static::crearOBJ($registro);
        }
        //liberar memoria
        $resultado->free();
        //retornar resultados
        return $array;
    }

    protected static function crearOBJ($registro){
        $objeto = new static();
        foreach ($registro as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        // debugear($objeto);
        return($objeto);
    }
    //sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($array){
        foreach($array as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
        
    }
}
