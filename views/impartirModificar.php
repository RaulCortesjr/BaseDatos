<?php
session_start();
require_once('../funciones.php');

require_once("../models/CimpartirBD.php");
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
$impartir = new CImpartirBD();
$impartir_id = filter_input(INPUT_GET,"id");
$impartir->impartir_id = $impartir_id;
$impartir->seleccionar();
?>
<form action="../controllers/Cimpartir.php?o=<?php echo MODIFICAR; ?>&id=<?php echo $impartir_id?>" method="post">
    <h1>MODIFICAR</h1>
    <br /><br />
    <label>Profesor: </label>
    <input type="text" name="profesor" value="<?php echo $impartir->profesor_id;?>">
    <br><br>
    <label>Asignatura:</label>
    <input type="text" name="asignatura" value="<?php echo $impartir->asignatura_id;?>">
    <br /><br />
    <label>Clase: </label>
    <input type="text" name="clase" value="<?php echo $impartir->clase;?>">
    <br><br>
    <label>Horario: </label>
    <input type="text" name="horario" value="<?php echo $impartir->horario;?>">
    <br><br>
    <label>Duracion: </label>
    <input type="text" name="duracion" value="<?php echo $impartir->duracion;?>">
    <br><br>
    <input type="submit" name="aceptar">
    <br /><br />
    <input type="reset" name="borrar">
    <br /><br />
    <button type ="cancel" onclick="window.location='../views/impartir.php';return false">Cancelar</button>
    </form>