<?php
require_once('Cbd.php');

class CUsuariosBD extends CBD
{
    public $usuario_id;
    public $usuario;
    public $contrasenia;
    public $email;
    public $rol;
    public $filas;

    public function insertar()
    {
        $sql = "INSERT INTO usuarios VALUES (default, '$this->usuario', '$this->contrasenia', '$this->email', $this->rol)";

        return $this->_ejecutar($sql);
        
    }

    public function modificar()
    {
        $sql = "UPDATE  usuarios 
                SET usuario='$this->usuario',
                    contrasenia='$this->contrasenia',
                    email='$this->email',
                    rol=$this->rol
                WHERE usuario_id='$this->usuario_id'";
        return $this->_ejecutar($sql);
    }

    public function borrar()
    {
        $sql = "DELETE FROM usuarios WHERE usuario_id=$this->usuario_id";
        return $this->_ejecutar($sql);
    }

    public function seleccionar()
    {

        
        $sql = "SELECT * FROM usuarios";

        if($this->usuario_id != 0)
        {
            $sql .= " WHERE usuario_id=$this->usuario_id";
        }
        $this->filas = $this->_consultar($sql);
        if($this->filas == null)
        {
            return false;
        }
        if($this->usuario_id != 0){
            $this->usuario = $this->filas[0]->usuario; //como me devuelve un unico elemento esta en la posicion 0
            $this->contrasenia = $this->filas[0]->contrasenia;
            $this->email = $this->filas[0]->email;
            $this->rol = $this->filas[0]->rol;
        }
        return true;
    }
}
/*
para insertar:
$usuario = new CUsuariosBD;
$usuario->usuario = 'Jose'; 
$usuario->contrasenia = 'root';
$usuario->email = 'jose@gmail.com';
if($usuario->insertar() != 1){
    echo $usuario->error;

}
Si ejecutamos esto, abriendolo con localhost en internet, nos crea uno nuevo en la base de datos.
*/

/*
para modificar:
$usuario = new CUsuariosBD;
$usuario->usuario_id = 3; 
$usuario->usuario = 'Andres'; 
$usuario->contrasenia = 'root';
$usuario->email = 'andres@gmail.com';
if($usuario->modificar() != 1){
    echo $usuario->error;
}
*/

/*
para consultar:
$usuario = new CUsuariosBD;
$usuario->usuario_id = 0; 
if($usuario->_seleccionar())
{
    foreach($usuario->filas as $fila)
    {
        echo $fila->usuario . '<br>';
    }
}
*/

/*
para borrar:
$usuario = new CUsuariosBD;
$usuario->usuario_id = 3; 
if($usuario->borrar() != 1)
{
    echo $usuario->error;
}
*/
?>