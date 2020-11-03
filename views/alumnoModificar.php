<?php
session_start();
require_once('../funciones.php');

require_once("../models/CalumnosBD.php");
require_once("../funciones.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$alumno = new CAlumnosBD();
$alumno_nia = filter_input(INPUT_GET,"id");
$alumno->alumno_nia = $alumno_nia;
$alumno->seleccionar();
?>
<form action="../controllers/Calumnos.php?o=<?php echo MODIFICAR; ?>&id=<?php echo $alumno_nia?>" method="post">
    <h1>MODIFICAR</h1>
    <br /><br />
    <label>Matricula: </label>
    <input type="number" name="matricula" value="<?php echo $alumno->n_matricula;?>">
    <br><br>
    <label>Nombre:</label>
    <input  type="text" name="nombre"  value="<?php echo $alumno->nombre;?>" required/>
    <br /><br />
    <label>Apellidos:</label>
    <input  type="text" name="apellidos"  value="<?php echo $alumno->apellidos;?>" required/>
    <br /><br />
    <label>Email:</label>
    <input type="email" name="email"  value="<?php echo $alumno->email;?>" />
    <br /><br />
    <label>Telefono1: </label>
    <input type="tel" name="tel1"  value="<?php echo $alumno->telefono;?>">
    <br><br>
    <label>Telefono2: </label>
    <input type="tel" name="tel2"  value="<?php echo $alumno->telefono2;?>">
    <br><br>
    <label>Daw: </label>
    <input type="checkbox" name="daw" value="1" <?php echo ($alumno->DAW == 1 ? 'checked' : '') ?> />
    <br><br>
    <label>Dam: </label>
    <input type="checkbox" name="dam" value="1" <?php echo ($alumno->DAM == 1 ? 'checked' : '') ?>/>
    <br><br>
    <label>Presencial: </label>
    <input type="checkbox" name="presencial" value="1" <?php echo ($alumno->presencial == 1 ? 'checked' : '') ?>/>
    <br><br>
    <label>Curso: </label>
    <input type="number" name="curso"  value="<?php echo $alumno->curso;?>">
    <br><br>
    <input type="submit" name="aceptar">
    <br /><br />
    <input type="reset" name="borrar">
    <br /><br />
    <button type ="cancel" onclick="window.location='../views/usuarios.php';return false">Cancelar</button>
    </form>