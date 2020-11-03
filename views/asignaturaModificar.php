<?php
session_start();
require_once('../funciones.php');

require_once("../models/CasignaturasBD.php");
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
$asignatura = new CAsignaturasBD();
$asignatura_id = filter_input(INPUT_GET,"id");
$asignatura->asignatura_id = $asignatura_id;
$asignatura->seleccionar();
?>
<form action="../controllers/Casignaturas.php?o=<?php echo MODIFICAR; ?>&id=<?php echo $asignatura_id?>" method="post">
    <h1>MODIFICAR</h1>
    <br /><br />
    <label>Código: </label>
    <input type="text" name="codigo" value="<?php echo $asignatura->codigo;?>">
    <br><br>
    <label>Nombre:</label>
    <input  type="text" name="nombre"  value="<?php echo $asignatura->nombre;?>" required/>
    <br /><br />
    <label>Curso: </label>
    <select name="curso" id="curso">
        <option value="1" <?php echo ($asignatura->curso == 1 ? "selected" : "");?>>Primero</option>
        <option value="2" <?php echo ($asignatura->curso == 2 ? "selected" : "");?>>Segundo</option>
    </select>
    <br><br>
    <input type="submit" name="aceptar">
    <br /><br />
    <input type="reset" name="borrar">
    <br /><br />
    <button type ="cancel" onclick="window.location='../views/asignaturas.php';return false">Cancelar</button>
    </form>