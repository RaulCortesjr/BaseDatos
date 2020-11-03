<?php

require_once('../models/CasignaturasBD.php');
require_once('../funciones.php');
//aqui es donde recibimos por get la opcion y el id
$opcion = filter_input(INPUT_GET,'o');
$asignatura_id = filter_input(INPUT_GET,'id');

$asignatura = new CAsignaturasBD();
//por post pasamos los campos
switch ($opcion)
{
    case INSERTAR:
        $asignatura->codigo = filter_input(INPUT_POST,'codigo');
        $asignatura->nombre = filter_input(INPUT_POST,'nombre');
        $alumno->presencial = filter_input(INPUT_POST, 'presencial', FILTER_VALIDATE_BOOLEAN) == TRUE?1:0;
        $asignatura->curso = filter_input(INPUT_POST,'curso',FILTER_VALIDATE_BOOLEAN) == TRUE?1:0;
        $asignatura->insertar();
    break;
    case MODIFICAR:
        $asignatura->asignatura_id = $asignatura_id;
        $asignatura->codigo = filter_input(INPUT_POST,'codigo');
        $asignatura->nombre = filter_input(INPUT_POST,'nombre');
        $alumno->presencial = filter_input(INPUT_POST, 'presencial', FILTER_VALIDATE_BOOLEAN) == TRUE?1:0;
        $asignatura->curso = filter_input(INPUT_POST,'curso',FILTER_VALIDATE_BOOLEAN) == TRUE?1:0;
        $asignatura->modificar();
    break;
    case BORRAR:
        $asignatura->asignatura_id = $asignatura_id;

        $asignatura->borrar();
    break;
}

header("location: ../views/asignaturas.php");
?>
