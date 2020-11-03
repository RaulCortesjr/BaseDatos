<?php
session_start();
require_once("../models/CasignaturasBD.php");
require_once("../constants/constants.inc.php");
$asignatura = new CAsignaturasBD();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <title>Asignaturas</title>
</head>
<body>
<?php require_once('menu.php'); ?> 
<br><br>
<table>
    <tr>
        <th>codigo</th>
        <th>nombre</th>
        <th>curso</th>
        <th>Opciones</th>
    </tr>
    <?php
    if($asignatura->seleccionar())
    {
        foreach($asignatura->filas as $fila) 
        {
        ?>
            <tr>
                <td><?php echo $fila->codigo; ?></td>
                <td><?php echo $fila->nombre; ?></td>
                <td><?php echo $fila->curso; ?></td>
                <td>
                <button class = "editar" 
                onclick = "location.href = 'asignaturaModificar.php?o=<?php echo MODIFICAR;?>&id=<?php echo $fila->asignatura_id;?>'"><i class="fas fa-user-edit"></i></button>
                <button name="borrar" class="borrar"
                tag = '../controllers/Casignaturas.php?o=<?php echo BORRAR;?>&id=<?php echo $fila->asignatura_id;?>'><i class="fas fa-trash"></i></button>
                </td>
                <?php
            }//foreach
                ?>
            </tr>
        <?php
    } //if
    ?>
            <tr>
                <td colspan="11"><button style="width: 130px; height: 38px; margin: 3px;  text-decoration: none;
                                              padding: 10px; font-weight: 600; color: #ffffff; background-color: green; border-radius: 6px; border: 2px solid #ffffff"
                                onclick= "location.href = 'asignaturaInsertar.php'"><i class="fas fa-user-plus"></i></button></td>
            </tr>
            <script type="text/javascript">
var borrar = document.getElementsByName("borrar");

borrar.forEach(e =>
 {
    e.addEventListener('click',function(ex){
        if(confirm ("¿Estás seguro que quieres borrar el usuario selecionado?"))
            location.href=ex.target.getAttribute("tag");
    },false);
});
</script>
<script src="../node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
</body>
</html>