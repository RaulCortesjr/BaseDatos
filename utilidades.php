<?php
//esta página es solo para el programador para ver cosas como por ejemplo contraseñas desencriptadas
require_once("funciones.php");
$password = '123456';
$encriptado = encriptar_desencriptar(ENCRIPTAR,$password);
echo $encriptado. '<br>';
$desencriptado = encriptar_desencriptar(DESENCRIPTAR,'WlFlcWFUbndWb095Tmk3ci9TSndLZz09');
echo $desencriptado. '<br>';
?>