<?php
require_once('Cbd.php');

class CProfesoresBD extends CBD
{
    public $profesor_id;
    public $dni;
    public $nombre;
    public $apellidos;
    public $telefono;
    public $email;
    public $direccion;
    public $cp;
    public $poblacion;
    public $provincia;

    public function insertar()
    {
        $sql = "INSERT INTO profesores VALUES (default, '$this->dni', '$this->nombre', '$this->apellidos'
        ,'$this->telefono', '$this->email', '$this->direccion', '$this->cp', '$this->poblacion','$this->provincia')";
        //die($sql);
        return $this->_ejecutar($sql);
        
    }

    public function modificar()
    {
        $sql = "UPDATE  profesores 
                SET dni='$this->dni',
                nombre='$this->nombre',
                apellidos='$this->apellidos',
                telefono='$this->telefono',
                email='$this->email',
                direccion='$this->direccion',
                cp='$this->cp',
                poblacion='$this->poblacion',
                provincia='$this->provincia'
                WHERE profesor_id='$this->profesor_id'";
        return $this->_ejecutar($sql);
    }

    public function borrar()
    {
        $sql = "DELETE FROM profesores WHERE profesor_id=$this->profesor_id";
        return $this->_ejecutar($sql);
    }

    public function seleccionar($alumno_nia = 0)
    {

        
        $sql = "SELECT * FROM profesores";

        if($this->profesor_id != 0)
        {
            $sql .= " WHERE profesor_id=$this->profesor_id";
        }
        $this->filas = $this->_consultar($sql);
        if($this->filas == null)
        {
            return false;
        }
        if($this->profesor_id != 0){
            $this->dni = $this->filas[0]->dni; //como me devuelve un unico elemento esta en la posicion 0
            $this->nombre = $this->filas[0]->nombre;
            $this->apellidos = $this->filas[0]->apellidos;
            $this->telefono = $this->filas[0]->telefono;
            $this->email = $this->filas[0]->email;
            $this->direccion = $this->filas[0]->direccion;
            $this->cp = $this->filas[0]->cp;
            $this->poblacion = $this->filas[0]->poblacion;
            $this->provincia = $this->filas[0]->provincia;
        }
        return true;
    }
}
?>