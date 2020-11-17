<?php
require_once("../models/consultaProfesoresBD.php");
require_once("../reports/consultaProfesoresPDF.php");

//Profesores
$nombreProfesor = filter_input(INPUT_POST, 'nombre');
$apellidos = filter_input(INPUT_POST, 'apellidos');
$email = filter_input(INPUT_POST, 'email');
$direccion = filter_input(INPUT_POST, 'direccion');
$cp = filter_input(INPUT_POST, 'cp');
$poblacion = filter_input(INPUT_POST, 'poblacion');
$provincia = filter_input(INPUT_POST, 'provincia');

//Imparte
$clase = filter_input(INPUT_POST,'clase');
$horario = filter_input(INPUT_POST,'horario');
$duracion = filter_input(INPUT_POST,'duracion');

//Asignaturas
$nombreAsignatura = filter_input(INPUT_POST,'nombreAsignaturas');
$curso = filter_input(INPUT_POST,'curso');

$consultaProfesores = new consultaProfesoresBD();
$consultaProfesores->nombreProfesor;
$consultaProfesores->apellidos;
$consultaProfesores->email;
$consultaProfesores->direccion;
$consultaProfesores->cp;
$consultaProfesores->poblacion;
$consultaProfesores->provincia;
$consultaProfesores->clase;
$consultaProfesores->horario;
$consultaProfesores->duracion;
$consultaProfesores->nombreAsignatura;
$consultaProfesores->curso;

$pdf = new consultaProfesoresPDF();

if($consultaProfesores->seleccionar()){
    $pdf->filas = $consultaProfesores->filas;
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->Imprimir();
    $pdf->Output();
}

header('Location:../models/consultaProfesoresBD.php');

?>

