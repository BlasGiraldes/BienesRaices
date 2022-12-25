<?php

namespace Model;
ini_set('display_errors', 1);

class ActiveRecord {
    
    // Base de DATOS 
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    // Errores 

    protected static $errores = [];



    // Definir la conexion al BD

    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function guardar()
    {

        if (isset($this->id)) {
            //actualizar
            $this->actualizar();
        } else {
            //creando un nuevo registro
            $this->crear();
        }
    }
    public function crear()
    {

        // SANITIZAR LOS DATOS

        $atributos = $this->sanitizarAtributos();



        // Insertar en la base de datos

        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);


        // MENASJE DE EXITO 
        if ($resultado) {
            // Redireccionar al usuario 

            header('Location: /admin?mensaje=1');
        }    
    }

    public function actualizar()
    {
        // SANITIZAR LOS DATOS

        $atributos = $this->sanitizarAtributos();


        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query =  "UPDATE " . static::$tabla . " SET ";
        $query .= join(',', $valores);
        $query .=  " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if($resultado) {
            // Redireccionar al usuario 

            header('Location: /admin?mensaje=2');
        }
    }
    // Eliminar un registro

    public function eliminar(){
             $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
            $resultado = self::$db->query($query);


            if($resultado){
                $this->borrarImagen();
                header('location: /admin?mensaje=3');
            }
        }

    // Identifica y une los atributos de la BD
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    // Subida de archivos

    public function setImagen($imagen)
    {
        // Elimina la imagen previa

        if (isset($this->id)) {
            $this->borrarImagen();
        }
        // Asignar al atributo de imagen el nombre de la imagen

        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    // Elimina el archivo

    public function borrarImagen(){
        if (isset($this->id)) {

            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
            if ($existeArchivo) {
                unlink(CARPETA_IMAGENES . $this->imagen);
            }
        }
    }
    // Validacion 


    public static function getErrores(){

        return self::$errores;
    }
    public function validar()
    {
        static::$errores = [];

        return static::$errores;
    }

    // Lista todas los registros

    public static function all()
    {
        $query = "SELECT * FROM ". static::$tabla;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Obtiene determinado numero de registros.

    public static function get($cantidad)
    {
        $query = "SELECT * FROM ". static::$tabla . " LIMIT " . $cantidad;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }


    // Busca un registro por su id

    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . "  WHERE id = ${id}";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    public static function consultarSQL($query)
    {
        // Consultar la db

        $resultado = self::$db->query($query);
        //iterar los resultados
        $array = [];

        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // liberar la memoria
        $resultado->free();


        //retornar los resultados

        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    // Sincroniza el objeto en memoria con los cambios relaizados por el usuario

    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}