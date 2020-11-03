<?php
require_once('Cbd.php');

class CAlumnosBD extends CBD
{
    public $alumno_nia;
    public $n_matricula;
    public $nombre;
    public $apellidos;
    public $email;
    public $telefono;
    public $telefono2;
    public $DAW;
    public $DAM;
    public $presencial;
    public $curso;
    public $filas;

    public function insertar()
    {
        $sql = "INSERT INTO alumnos VALUES (default, '$this->n_matricula', '$this->nombre', '$this->apellidos'
        , '$this->email', '$this->telefono', '$this->telefono2', '$this->DAW', '$this->DAM', '$this->presencial','$this->curso')";
        //die($sql);
        return $this->_ejecutar($sql);
        
    }

    public function modificar()
    {
        $sql = "UPDATE  alumnos 
                SET n_matricula='$this->n_matricula',
                nombre='$this->nombre',
                apellidos='$this->apellidos',
                email='$this->email',
                telefono='$this->telefono',
                telefono2='$this->telefono2',
                DAW='$this->DAW',
                DAM='$this->DAM',
                presencial='$this->presencial',
                curso='$this->curso'
                WHERE alumno_nia='$this->alumno_nia'";
        return $this->_ejecutar($sql);
    }

    public function borrar()
    {
        $sql = "DELETE FROM alumnos WHERE alumno_nia=$this->alumno_nia";
        return $this->_ejecutar($sql);
    }

    public function seleccionar($alumno_nia = 0)
    {

        
        $sql = "SELECT * FROM alumnos";

        if($this->alumno_nia != 0)
        {
            $sql .= " WHERE alumno_nia=$this->alumno_nia";
        }
        $this->filas = $this->_consultar($sql);
        if($this->filas == null)
        {
            return false;
        }
        if($this->alumno_nia != 0){
            $this->n_matricula = $this->filas[0]->n_matricula; //como me devuelve un unico elemento esta en la posicion 0
            $this->nombre = $this->filas[0]->nombre;
            $this->apellidos = $this->filas[0]->apellidos;
            $this->email = $this->filas[0]->email;
            $this->telefono = $this->filas[0]->telefono;
            $this->telefono2 = $this->filas[0]->telefono2;
            $this->DAW = $this->filas[0]->DAW;
            $this->DAM = $this->filas[0]->DAM;
            $this->presencial = $this->filas[0]->presencial;
            $this->curso = $this->filas[0]->curso;
        }
        return true;
    }
}

/*
$usuario = new CAlumnosBD;
$usuario->n_matricula = '1024'; 
$usuario->contrasenia = 'root';
$usuario->nombre = 'Gonzalo';
$usuario->apellidos = 'Guedes Santos';
$usuario->email = 'gonzalo@gmail.com';
$usuario->telefono = '711705986';
$usuario->telefono2 = '6566936857';
$usuario->DAW = 1;
$usuario->DAM = 0;
$usuario->presencial = 1;
$usuario->curso = 1;
if($usuario->insertar() != 1){
    echo $usuario->error;
}
*/

/*
para consultar:
$usuario = new CAlumnosBD;
$usuario->alumno_nia = 1; 
if($usuario->_seleccionar())
{
    foreach($usuario->filas as $fila)
    {
        echo $fila->n_matricula . '<br>';
    }
}
*/

/*
para modificar:
$usuario = new CAlumnosBD;
$usuario->alumno_nia = 1; 
$usuario->n_matricula = '1024'; 
$usuario->contrasenia = 'root';
$usuario->nombre = 'Marcos';
$usuario->apellidos = 'Guedes Santos';
$usuario->email = 'gonzalo@gmail.com';
$usuario->telefono = '711705986';
$usuario->telefono2 = '6566936857';
$usuario->DAW = 0;
$usuario->DAM = 1;
$usuario->presencial = 0;
if($usuario->modificar() != 1){
    echo $usuario->error;
}
*/

/*
para borrar:
$usuario = new CAlumnosBD();
$usuario->alumno_nia = 1;
$usuario->borrar();
*/

?>