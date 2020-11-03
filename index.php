<?php
session_start();
setlocale(LC_ALL, "");
setlocale(LC_ALL,"es_ES.UTF-8");

if(isset($_SESSION['usuario']))
    header('Location: views/main.php');
else
    header('Location: views/login.php');
?>