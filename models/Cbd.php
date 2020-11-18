<?php

require_once('../constants/constants.inc.php'); //requiere_once solo cogerá el archivo una vez

class CBD
{
    private $con = null; //conexión a la bd
    public $error = ''; //para guardar errores

    //creamos la clase 
    function __construct()
    {
        $this->error = ''; //la flecha es como poner un punto en otros lenguajes
        try
        {
            //creamos la conexión
            $this->con = new PDO("mysql:host=" . BD_SERVIDOR . ";dbname=" . BD_BASEDATOS . ";charset=utf8", BD_USUARIO, BD_CONSTRASENIA);
            //La conexion a la bd durará tanto como dure el objeto creado pdo
            
            if ($this->con)
            {
                
                //ponemos los atributos para gestionar los errores mediante excepción
                $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                //el juego de caracteres será utf8
                $this->con->exec("SET CHARACTER SET UTF8"); //exec() es un metodo que nos permite ejecutar un comando y guardar el resultado en una variable.
                
            }

        }
        catch(PDOException $e)
        {
            
            $this->error = $e->getMessage(); //getMessage obtiene el mensaje de Excepción, no tiene parámetros
            
        }
    }

    function __destruct()
    {
        $this->con = null; //cerramos la conexión a la base de datos
    }

    protected function _consultar($query)
    {
        //Recordatorio: private = solo tú, protected = tú y tus descendientes, public = cualquiera.
        $this->error = '';

        $filas = null; //filas que nos devolverá 
        try
        {
            $stmt = $this->con->prepare($query); //Preparamos la consulta
            $stmt->execute(); //Ejecutamos consulta
            
            if($stmt -> rowCount() > 0)
            {
                $filas = array();
                while($registro = $stmt->fetchObject()) //Para cada registro obtenido de la consulta, fetch_object — Recupera una fila de resultados como un objeto
                    $filas[] = $registro; //Guardamos la fila en el vector;
            }
        }
        catch(PDOException $e)
        {
            $this->error = $e->getMessage();
        }
        //die($filas);
        return $filas; //Devuelve las filas obtenidas.
    }

    protected function _ejecutar($query)
    {
        //insert,update,delete
        $this->error = '';
        $filas = 0; 
        try
        {
            $filas = $this->con->exec($query); //Ejecutamos la sentencia y obtenemos el numero de filas afectadas

        }
        catch(PDOException $e)
        {
            $this->error = $e->getMessage();
            die($this->error);
        }
        return $filas; //devuelve las filas afectadas por insert,update o delete
    }

    protected function _ultimoId()
    {
        return $this->con->lastInsertId(); //Obtenemos el ultimo id insertado
    }
}

?>