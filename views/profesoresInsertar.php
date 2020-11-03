<?php
 session_start();
 require_once('../constants/constants.inc.php');
 require_once('../models/CprofesoresBD.php');
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
    <form action="../controllers/Cprofesores.php?o=<?php echo INSERTAR; ?>&id=0" method="post">
    <h1>INSERTAR</h1>
    <br /><br />
    <label>DNI: </label>
    <input type="text" name="dni">
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
    <label>Telefono: </label>
    <input type="tel" name="telefono">
    <br><br>
    <label>Dirección: </label>
    <input type="text" name="direccion" value=""/>
    <br><br>
    <label>CP: </label>
    <input type="text" name="cp" value=""/>
    <br><br>
    <label>Población: </label>
    <input type="text" name="poblacion" value=""/>
    <br><br>
    <label>Provincia: </label>
    <input type="text" name="provincia">
    <br><br>
    <input type="submit" name="aceptar">
    <br /><br />
    <input type="reset" name="borrar">
    <br /><br />
    <button type ="cancel" onclick="window.location='../views/profesores.php';return false">Cancelar</button>
    </form>
</body>
</html>