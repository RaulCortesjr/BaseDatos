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
    <?php
    require_once("../models/CProfesoresBD.php");
    $profesores = new CProfesoresBD();
    $profesores->seleccionar();
    ?>
    <select name="profesor" id="profesor">
    <?php 
       foreach($profesores->filas as $fila)
       {
           ?>
           <option value="<?php echo $fila->profesor_id; ?>"><?php echo $fila->nombre; ?></option>
           <?php
       }
          ?>
    </select>
    <br><br>
    <label>Asignatura:</label>
    <?php
    require_once("../models/CasignaturasBD.php");
    $asignaturas = new CAsignaturasBD();
    $asignaturas->seleccionar();
    ?>
    <select name="asignatura" id="asignatura">
       <?php 
       
        
        foreach($asignaturas->filas as $fila)
        {
            ?>
            <option value="<?php echo $fila->asignatura_id; ?>"><?php echo $fila->nombre; ?></option>
            <?php
        }
           ?> 
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
    </body>
    </html>