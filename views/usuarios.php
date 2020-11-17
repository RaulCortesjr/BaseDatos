<?php
 session_start();
 require_once('../models/CusuariosBD.php');
 require_once('../funciones.php');
 if(!logueado())
 {
    header('Location: login.php');
    die();
 }
 $usuarios = new CUsuariosBD();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
</head>
<body>
    <?php require_once('menu.php'); ?> 
    <!--<h1 id="titulo">-->
    <?php 
    //echo $_SESSION['usuario'];
    ?>
     <!--</h1>-->
    <table>
    <tr>
        <th id="boton">Usuario_id</th>
        <th>Usuario</th>
        <th>Contraseña</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Opciones</th>
    </tr>

    <?php
   //Saber cual es su rol
    $usuarios->usuario_id = 0;

    if(!$_SESSION['rol']){
        $usuarios->usuario_id = $_SESSION['usuario_id'];


    }
    if ($usuarios->seleccionar())
    {
        foreach($usuarios->filas as $fila) 
        {
        ?>
            <tr>
                <td><?php echo $fila->usuario_id; ?></td>
                <td><?php echo $fila->usuario; ?></td>
                <td><?php echo $fila->contrasenia; ?></td>
                <td><?php echo $fila->email; ?></td></div>
                <td ><?php echo ($fila->rol  ? '<i class="far fa-check-square"></i>' : '<i class="far fa-square"></i>') ?></td>
                <td>
                    
                <button class = "editar" 
                onclick = "location.href = 'usuariosModificar.php?o=<?php echo MODIFICAR;?>&id=<?php echo $fila->usuario_id;?>'"><i class="fas fa-user-edit"></i></button>
                <?php
                if($_SESSION['usuario_id'] != $fila->usuario_id)
                {
                ?>
                    <button name="borrar" class="borrar"><i class="fas fa-trash"></i></button>
                    </td>
                <?php
                }
                ?>
            </tr>
        <?php
        } //foreach
    } //if
    ?>
            <tr>
                <td colspan="6">
                    <?php if($_SESSION['rol']) : ?>
                    <button style="width: 130px; height: 38px; margin: 3px;  text-decoration: none;
                                              padding: 10px; font-weight: 600; color: #ffffff; 
                                              background-color: green; border-radius: 6px; border: 2px solid #ffffff"
                                              onclick= "location.href = 'usuariosInsertar.php'"><i class="fas fa-user-plus"></i></button>
                    <a href = "../reports/usuariosPDF.php?o=I"><i class="fas fa-file-pdf"></i></a>
                    <a href = "../reports/usuariosPDF.php?o=D"><i class="fas fa-file-pdf"></i></a></td>
                    <?php else: ?>
                                <a href = "../reports/usuariosPDF.php?id=<?php echo $usuarios->usuario_id; ?>o=D"><i class="fas fa-file-pdf"></i></a></td>
                                <a href = "../reports/usuariosPDF.php?id=<?php echo $usuarios->usuario_id; ?>o=I"><i class="fas fa-file-pdf"></i></a></td>
                    <?php endif; ?>
            </tr>

    </table>
<script type="text/javascript">
var borrar = document.getElementsByName("borrar");

borrar.forEach(e =>
 {
    e.addEventListener('click',function(ex){
        if(confirm ("¿Estás seguro que quieres borrar el usuario selecionado?"))
            location.href="../controllers/Cusuarios.php?o=<?php echo BORRAR;?>&id=<?php echo $fila->usuario_id;?>"
    },false);
});
</script>
<script src="../node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
</body>
</html>