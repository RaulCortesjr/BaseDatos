<?php

require_once('../models/CprofesoresBD.php');
require_once('../funciones.php');
//aqui es donde recibimos por get la opcion y el id
$opcion = filter_input(INPUT_GET,'o');
$profesor_id = filter_input(INPUT_GET,'id');

$profesor = new CProfesoresBD();
//por post pasamos los campos
switch ($opcion)
{
    case INSERTAR:
        $profesor->dni = filter_input(INPUT_POST,'dni');
        $profesor->nombre = filter_input(INPUT_POST,'nombre');
        $profesor->apellidos = filter_input(INPUT_POST,'apellidos');
        $profesor->telefono = filter_input(INPUT_POST,'tel1');
        $profesor->email = filter_input(INPUT_POST,'email');
        $profesor->direccion = filter_input(INPUT_POST, 'direccion');
        $profesor->cp = filter_input(INPUT_POST, 'cp');
        $profesor->provincia = filter_input(INPUT_POST, 'provincia');
        $profesor->poblacion = filter_input(INPUT_POST,'poblacion');
        $profesor->insertar();
    break;
    case MODIFICAR:
        $profesor->profesor_id = $profesor_id;
        $profesor->dni = filter_input(INPUT_POST,'dni');
        $profesor->nombre = filter_input(INPUT_POST,'nombre');
        $profesor->apellidos = filter_input(INPUT_POST,'apellidos');
        $profesor->telefono = filter_input(INPUT_POST,'tel1');
        $profesor->email = filter_input(INPUT_POST,'email');
        $profesor->direccion = filter_input(INPUT_POST, 'direccion');
        $profesor->cp = filter_input(INPUT_POST, 'cp');
        $profesor->provincia = filter_input(INPUT_POST, 'provincia');
        $profesor->poblacion = filter_input(INPUT_POST,'poblacion');
        $profesor->modificar();
    break;
    case BORRAR:
        $profesor->profesor_id = $profesor_id;

        $profesor->borrar();
    break;
}

header("location: ../views/profesores.php");
?>