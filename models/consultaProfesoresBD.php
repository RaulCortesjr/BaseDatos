<?php
require_once('Cbd.php');
class consultaProfesoresBD extends CBD
{
    public $nombreProfesor;
    public $apellidos;
    public $email;
    public $direccion;
    public $cp;
    public $poblacion;
    public $provincia;

    public $nombreAsignatura;
    public $curso;

    public $clase;
    public $horario;
    public $duracion;

    public function seleccionar()
    {
        //Los cojo todos con esta query
        $sql = 
        "SELECT profesores.*, asignaturas.*,insertar.* 
        FROM profesores, asignaturas, insertar 
        WHERE profesores.profesor_id= insertar.insertar_id 
        AND asignaturas.asignatura_id=insertar.insertar_id";

        //Realizamos la consulta
        

        /*$sql = "SELECT 'nombre', 'apellidos', 'email','direccion','cp','poblacion','provincia',
        'clase','horario','provincia' FROM profesores p, impartir i, asignaturas a WHERE p.profesor_id = i.profesor_id
        AND a.asignatura_id = i.asignatura_id";
        
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
        return true;*/
    }
}
?>