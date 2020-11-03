<?php
 session_start();
 require_once('../constants/constants.inc.php');
 require_once('../models/CusuariosBD.php');
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
    <form action="../controllers/Calumnos.php?o=<?php echo INSERTAR; ?>&id=0" method="post">
    <h1>INSERTAR</h1>
    <br /><br />
    <label>Matricula: </label>
    <input type="number" name="matricula">
    <br><br>
    <label>Nombre:</label>
    <input  type="text" name="nombre"  value="" required/>
    <br /><br />
    <label>Apellidos:</label>
    <input  type="text" name="apellidos"  value=""required/>
    <br /><br />
    <label>Email:</label>
    <input type="email" name="email"  value=""/>
    <br /><br />
    <label>Telefono1: </label>
    <input type="tel" name="tel1">
    <br><br>
    <label>Telefono2: </label>
    <input type="tel" name="tel2">
    <br><br>
    <label>Daw: </label>
    <input type="checkbox" name="daw" value="1"/>
    <br><br>
    <label>Dam: </label>
    <input type="checkbox" name="dam" value="1"/>
    <br><br>
    <label>Presencial: </label>
    <input type="checkbox" name="presencial" value="1"/>
    <br><br>
    <label>Curso: </label>
    <input type="number" name="curso">
    <br><br>
    <input type="submit" name="aceptar">
    <br /><br />
    <input type="reset" name="borrar">
    <br /><br />
    <button type ="cancel" onclick="window.location='../views/usuarios.php';return false">Cancelar</button>
    </form>
</body>
</html>