<?php
 session_start();
 require_once('../constants/constants.inc.php');
 require_once('../models/CusuariosBD.php');
 require_once('../funciones.php');

 if(!logueado())
 {
    header('Location: login.php');
 }

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
    <form action="../controllers/Cusuarios.php?o=<?php echo INSERTAR; ?>&id=0" method="post">
    <h1>INSERTAR</h1>
    <label>Usuario_id:</label>
    <input type="text" name="usuario_id" readonly="" value=""/>
    <br /><br />
    <label>Usuario:</label>
    <input  type="text" name="usuario"  value="" required/>
    <br /><br />
    <label>Contraseña:</label>
    <input  id="contrasenia" type="password" name="contrasenia"  value=""required/>
    <button type="button" id="pass" onmousedown="passShow()" onmouseup="passHide()">...</button>
    <br /><br />
    <label>Email:</label>
    <input type="email" name="email"  value=""/>
    <br /><br />
    <label>Administrador:</label>
    <input type="checkbox" name="rol" value="1"/>
    <br />
    <input type="submit" name="aceptar">
    <br /><br />
    <input type="reset" name="borrar">
    <br /><br />
    <button type ="cancel" onclick="window.location='../views/usuarios.php';return false">Cancelar</button>
    </form>
    <script type="text/javascript">
        function passShow()
        {
            document.getElementById("contrasenia").type = "text";
        }
        function passHide()
        {
            document.getElementById("contrasenia").type = "password";
        }
    </script>
</body>
</html>