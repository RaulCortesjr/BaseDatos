<?php
session_start();
require_once('../funciones.php');

require_once("../models/CprofesoresBD.php");
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
$profesor = new CProfesoresBD();
$profesor_id = filter_input(INPUT_GET,"id");
$profesor->profesor_id = $profesor_id;
$profesor->seleccionar();
?>
<form action="../controllers/Cprofesores.php?o=<?php echo MODIFICAR; ?>&id=<?php echo $profesor_id?>" method="post">
    <h1>INSERTAR</h1>
    <br /><br />
    <label>DNI: </label>
    <input type="text" name="dni" value="<?php echo $profesor->dni;?>" >
    <br><br>
    <label>Nombre:</label>
    <input  type="text" name="nombre"  value="<?php echo $profesor->nombre;?>" />
    <br /><br />
    <label>Apellidos:</label>
    <input  type="text" name="apellidos"  value="<?php echo $profesor->apellidos;?>"/>
    <br /><br />
    <label>Email:</label>
    <input type="email" name="email"  value="<?php echo $profesor->email;?>"/>
    <br /><br />
    <label>Telefono: </label>
    <input type="tel" name="telefono" value="<?php echo $profesor->telefono;?>">
    <br><br>
    <label>Dirección: </label>
    <input type="text" name="direccion" value="<?php echo $profesor->direccion;?>"/>
    <br><br>
    <label>CP: </label>
    <input type="text" name="cp" value="<?php echo $profesor->cp;?>"/>
    <br><br>
    <label>Población: </label>
    <input type="text" name="poblacion" value="<?php echo $profesor->poblacion;?>"/>
    <br><br>
    <label>Provincia: </label>
    <input type="text" name="provincia" value="<?php echo $profesor->provincia;?>">
    <br><br>
    <input type="submit" name="aceptar">
    <br /><br />
    <input type="reset" name="borrar">
    <br /><br />
    <button type ="cancel" onclick="window.location='../views/profesores.php';return false">Cancelar</button>