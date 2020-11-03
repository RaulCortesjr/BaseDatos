<?php
 session_start();
 require_once('../constants/constants.inc.php');
 require_once('../models/CimpartirBD.php');
 require_once('../funciones.php');
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

?>
    <form action="../controllers/Cimpartir.php?o=<?php echo INSERTAR; ?>&id=0" method="post">
    <h1>Insertar</h1>
    <br /><br />
    <label>Profesor: </label>
    <select name="profesor" id="profesor">
        <option value="1" selected>Alejandro</option>
        <option value="2">Raul</option>
    </select>
    <br><br>
    <label>Asignatura:</label>
    <select name="asignatura" id="asignatura">
       // <?php
        //for($i = 0; $i < $impartir->seleccionar();$i++)
       // {?>
           <option value="1" selected><?php echo ?></option>
          <?php
        //}//for?>
    </select>
    <br /><br />
    <label>Clase: </label>
    <input type="text" name="clase">
    <br><br>
    <label>Horario: </label>
    <input type="text" name="horario">
    <br><br>
    <label>Duracion: </label>
    <input type="text" name="duracion">
    <br><br>
    <input type="submit" name="aceptar">
    <br /><br />
    <input type="reset" name="borrar">
    <br /><br />
    <button type ="cancel" onclick="window.location='../views/impartir.php';return false">Cancelar</button>
    </form>