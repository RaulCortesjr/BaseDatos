<?php

require_once('../models/CimpartirBD.php');
require_once('../funciones.php');
//aqui es donde recibimos por get la opcion y el id
$opcion = filter_input(INPUT_GET,'o');
$impartir_id = filter_input(INPUT_GET,'id');

$impartir = new CImpartirBD();
//por post pasamos los campos
switch ($opcion)
{
    case INSERTAR:
        $impartir->profesor_id = filter_input(INPUT_POST,'profesor');
        $impartir->asignatura_id = filter_input(INPUT_POST,'asignatura');
        $impartir->clase = filter_input(INPUT_POST, 'clase');
        $impartir->horario = filter_input(INPUT_POST,'horario') ;
        $impartir->duracion = filter_input(INPUT_POST,'duracion') ;
        $impartir->insertar();
    break;
    case MODIFICAR:
        $impartir->impartir_id = $impartir_id;
        $impartir->profesor_id = filter_input(INPUT_POST,'profesor');
        $impartir->asignatura_id = filter_input(INPUT_POST,'asignatura');
        $impartir->clase = filter_input(INPUT_POST, 'clase');
        $impartir->horario = filter_input(INPUT_POST,'horario') ;
        $impartir->duracion = filter_input(INPUT_POST,'duracion') ;
        $impartir->modificar();
    break;
    case BORRAR:
        $impartir->impartir_id = $impartir_id;

        $impartir->borrar();
    break;
}

header("location: ../views/impartir.php");
?>
