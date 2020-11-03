<?php
 session_start();
 require_once('../funciones.php');

 if(!logueado())
 {
    header('Location: login.php');
 }
require_once("../models/CusuariosBD.php");
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

$usuario = new CUsuariosBD();
$usuario_id = filter_input(INPUT_GET,"id");
$usuario->usuario_id = $usuario_id;
$usuario->seleccionar();

?>
    <form action="../controllers/Cusuarios.php?o=<?php echo MODIFICAR; ?>&id=<?php echo $usuario_id?>" method="post">

    <label>Usuario_id:</label>
    <input type="text" name="usuario_id" readonly="" value="<?php echo $usuario->usuario_id;?>"/>
    <br /><br />
    <label>Usuario:</label>
    <input type="text" name="usuario"  value="<?php echo $usuario->usuario;?>"/>
    <br /><br />
    <label>Contraseña:</label>
    <input type="text" name="contrasenia"  value="<?php echo encriptar_desencriptar(DESENCRIPTAR, $usuario->contrasenia);?>"/>
    <br /><br />
    <label>Email:</label>
    <input type="text" name="email"  value="<?php echo $usuario->email;?>"/>
    <br />
    <label>Administrador:</label>
    <input type="checkbox" name="rol" value= "1" <?php echo ($usuario->rol == 1 ? 'checked' : '') ?>/>
    <br />
    <input type="submit" name="aceptar">
    <br />
    <input type="reset" name="borrar">
    <br />
    </form>
</body>
</html>