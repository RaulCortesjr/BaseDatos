<?php

require_once('../models/CalumnosBD.php');
require_once('../funciones.php');
//aqui es donde recibimos por get la opcion y el id
$opcion = filter_input(INPUT_GET,'o');
$alumno_nia = filter_input(INPUT_GET,'id');

$alumno = new CAlumnosBD();
//por post pasamos los campos
switch ($opcion)
{
    case INSERTAR:
        $alumno->n_matricula = filter_input(INPUT_POST,'matricula');
        $alumno->nombre = filter_input(INPUT_POST,'nombre');
        $alumno->apellidos = filter_input(INPUT_POST,'apellidos');
        $alumno->email = filter_input(INPUT_POST,'email');
        $alumno->telefono = filter_input(INPUT_POST,'tel1');
        $alumno->telefono2 = filter_input(INPUT_POST,'tel2');
        $alumno->DAW = filter_input(INPUT_POST, 'daw', FILTER_VALIDATE_BOOLEAN) == TRUE?1:0;
        $alumno->DAM = filter_input(INPUT_POST, 'dam', FILTER_VALIDATE_BOOLEAN) == TRUE?1:0;
        $alumno->presencial = filter_input(INPUT_POST, 'presencial', FILTER_VALIDATE_BOOLEAN) == TRUE?1:0;
        $alumno->curso = filter_input(INPUT_POST,'curso');
        $alumno->insertar();
    break;
    case MODIFICAR:
        $alumno->alumno_nia = $alumno_nia;
        $alumno->n_matricula = filter_input(INPUT_POST,'matricula');
        $alumno->nombre = filter_input(INPUT_POST,'nombre');
        $alumno->apellidos = filter_input(INPUT_POST,'apellidos');
        $alumno->email = filter_input(INPUT_POST,'email');
        $alumno->telefono = filter_input(INPUT_POST,'tel1');
        $alumno->telefono2 = filter_input(INPUT_POST,'tel2');
        $alumno->DAW = filter_input(INPUT_POST, 'daw', FILTER_VALIDATE_BOOLEAN) == TRUE?1:0;
        $alumno->DAM = filter_input(INPUT_POST, 'dam', FILTER_VALIDATE_BOOLEAN) == TRUE?1:0;
        $alumno->presencial = filter_input(INPUT_POST, 'presencial', FILTER_VALIDATE_BOOLEAN) == TRUE?1:0;
        $alumno->curso = filter_input(INPUT_POST,'curso');
        $alumno->modificar();
    break;
    case BORRAR:
        $alumno->alumno_nia = $alumno_nia;

        $alumno->borrar();
    break;
}

header("location: ../views/alumnos.php");
?>