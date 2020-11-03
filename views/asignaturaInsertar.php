<?php
 session_start();
 require_once('../constants/constants.inc.php');
 require_once('../models/CasignaturasBD.php');
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
    <form action="../controllers/Casignaturas.php?o=<?php echo INSERTAR; ?>&id=0" method="post">
    <h1>INSERTAR</h1>
    <br /><br />
    <label>Código: </label>
    <input type="number" name="codigo">
    <br><br>
    <label>Nombre:</label>
    <input  type="text" name="nombre"  value="" required/>
    <br /><br />
    <label>Curso: </label>
    <select name="curso" id="curso">
        <option value="1" selected>Primero</option>
        <option value="2">Segundo</option>
    </select>
    <br><br>
    <input type="submit" name="aceptar">
    <br /><br />
    <input type="reset" name="borrar">
    <br /><br />
    <button type ="cancel" onclick="window.location='../views/asignaturas.php';return false">Cancelar</button>
    </form>
</body>
</html>