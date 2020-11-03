<?php

require_once('../models/CusuariosBD.php');
require_once('../funciones.php');
//aqui es donde recibimos por get la opcion y el id
$opcion = filter_input(INPUT_GET,'o');
$usuario_id = filter_input(INPUT_GET,'id');

$usuario = new CUsuariosBD();
//por post pasamos los campos
switch ($opcion)
{
    case INSERTAR:
        $contrasenia = filter_input(INPUT_POST,'contrasenia');
        $contrasenia = encriptar_desencriptar(ENCRIPTAR,$contrasenia);

        $usuario->usuario = filter_input(INPUT_POST,'usuario');
        $usuario->contrasenia = $contrasenia;
        $usuario->email = filter_input(INPUT_POST,'email');
        $usuario->rol = filter_input(INPUT_POST, 'rol', FILTER_VALIDATE_BOOLEAN) == TRUE?1:0;
        $usuario->insertar();
    break;
    case MODIFICAR:
        $contrasenia = filter_input(INPUT_POST,'contrasenia');
        $contrasenia = encriptar_desencriptar(ENCRIPTAR,$contrasenia);
        $usuario->usuario_id = $usuario_id;
        $usuario->usuario = filter_input(INPUT_POST,'usuario');
        $usuario->contrasenia = $contrasenia;
        $usuario->email = filter_input(INPUT_POST,'email');
        $usuario->rol = filter_input(INPUT_POST, 'rol', FILTER_VALIDATE_BOOLEAN) == TRUE?1:0;

        $usuario->modificar();
    break;
    case BORRAR:
        $usuario->usuario_id = $usuario_id;

        $usuario->borrar();
    break;
}

header("location: ../views/usuarios.php");
?>