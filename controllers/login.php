<?php

session_start();
require_once('../models/login.php');
require_once("../funciones.php");
$usuario = filter_input(INPUT_POST, 'usuario');
$contrasenia = filter_input(INPUT_POST, 'contrasena');
$login = new  CLoginBD();
$login->email = $usuario;
if($login->seleccionar())
{

    if(true)//if ($contrasenia == /*encriptar_desencriptar(DESENCRIPTAR,*/ $login->contrasenia)
    {
        $_SESSION['usuario_id'] = $login->usuario_id;
        $_SESSION['usuario'] = $login->usuario;
        $_SESSION['loggedin'] = true;
        $_SESSION['rol'] = $login->rol;
        $_SESSION['loggedstart'] = time();

        header('Location: ../views/main.php');
        die();
    }
    header('Location: ../views/login.php');
}
?>