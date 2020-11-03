<?php
require_once('Cbd.php');

class CAsignaturasBD extends CBD
{
    public $asignatura_id;
    public $codigo;
    public $nombre;
    public $curso;

    public function insertar()
    {
        $sql = "INSERT INTO asignaturas VALUES (default, '$this->codigo', '$this->nombre', $this->curso)";
        //die($sql);
        return $this->_ejecutar($sql);
        
    }

    public function modificar()
    {
        $sql = "UPDATE  asignaturas 
                SET codigo='$this->codigo',
                nombre='$this->nombre',
                curso=$this->curso
                WHERE asignatura_id=$this->asignatura_id";
        return $this->_ejecutar($sql);
    }

    public function borrar()
    {
        $sql = "DELETE FROM asignaturas WHERE asignatura_id=$this->asignatura_id";
        return $this->_ejecutar($sql);
    }

    public function seleccionar($alumno_nia = 0)
    {
        $sql = "SELECT * FROM asignaturas";

        if($this->asignatura_id != 0)
        {
            $sql .= " WHERE asignatura_id=$this->asignatura_id";
        }
        $this->filas = $this->_consultar($sql);
        if($this->filas == null)
        {
            return false;
        }
        if($this->asignatura_id != 0){
            $this->codigo = $this->filas[0]->codigo; //como me devuelve un unico elemento esta en la posicion 0
            $this->nombre = $this->filas[0]->nombre;
            $this->curso = $this->filas[0]->curso;
        }
        return true;
    }
}
?>