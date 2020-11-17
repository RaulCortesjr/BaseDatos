<?php
require_once('Cbd.php');

class CImpartirBD extends CBD
{
    public $impartir_id;
    public $profesor_id;
    public $asignatura_id;
    public $clase;
    public $horario;
    public $duracion;

    public function insertar()
    {
        $sql = "INSERT INTO impartir VALUES (default, $this->profesor_id, 
        $this->asignatura_id, '$this->clase','$this->horario','$this->duracion')";
        //die($sql);
        return $this->_ejecutar($sql);
        
    }

    public function modificar()
    {
        $sql = "UPDATE  impartir 
                SET profesor_id=$this->profesor_id,
                asignatura_id='$this->asignatura_id',
                clase=$this->clase,
                horario='$this->horario',
                duracion='$this->duracion'
                WHERE impartir_id=$this->impartir_id";
        return $this->_ejecutar($sql);
    }

    public function borrar()
    {
        $sql = "DELETE FROM impartir WHERE impartir_id=$this->impartir_id";
        return $this->_ejecutar($sql);
    }

    public function seleccionar()
    {
        $sql = "SELECT * ,
        (SELECT CONCAT(nombre,' ', apellidos) FROM profesores WHERE profesor_id = impartir.profesor_id)
        as profesor, 
        (SELECT CONCAT(codigo,' - ', nombre) FROM asignaturas WHERE asignatura_id = impartir.asignatura_id)
        as asignatura
        FROM impartir";

        if($this->impartir_id != 0)
        {
            $sql .= " WHERE impartir_id=$this->impartir_id";
        }
        $this->filas = $this->_consultar($sql);
        if($this->filas == null)
        {
            return false;
        }
        if($this->impartir_id != 0){
            $this->profesor_id = $this->filas[0]->profesor_id; //como me devuelve un unico elemento esta en la posicion 0
            $this->asignatura_id = $this->filas[0]->asignatura_id;
            $this->clase = $this->filas[0]->clase;
            $this->horario = $this->filas[0]->horario;
            $this->duracion = $this->filas[0]->duracion;
        }
        return true;
    }
}
?>