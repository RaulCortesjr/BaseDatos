<?php
require_once('Cbd.php');

class CLoginBD extends CBD
{
    public $usuario_id;
    public $usuario;
    public $contrasenia;
    public $email;
    public $rol;

    public function seleccionar()
    {
        $sql = "SELECT * FROM usuarios WHERE email='$this->email'";
        
        $filas = $this->_consultar($sql);
        if($filas == null)
        {
            return false;
        }
        $this->usuario_id = $filas[0]->usuario_id;
        $this->usuario = $filas[0]->usuario; //como me devuelve un unico elemento esta en la posicion 0
        $this->contrasenia = $filas[0]->contrasenia;
        $this->email = $filas[0]->email;
        $this->rol = $filas[0]->rol;
        return true;
    }
}