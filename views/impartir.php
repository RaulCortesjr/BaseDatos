<?php
session_start();
require_once("../models/CimpartirBD.php");
require_once("../constants/constants.inc.php");
require_once("../models/CprofesoresBD.php");
require_once("../models/CasignaturasBD.php");
$impartir = new CImpartirBD();
$asignatura = new CAsignaturasBD();
$profesor = new CProfesoresBD();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <title>Impartir</title>
</head>
<body>
<?php require_once('menu.php'); ?> 
<br><br>
<table>
    <tr>
        <th>Profesor</th>
        <th>Asignatura</th>
        <th>Clase</th>
        <th>Horario</th>
        <th>Duración</th>
        <th>Opciones</th>
    </tr>
    <?php
    if($impartir->seleccionar())
    {
        foreach($impartir->filas as $fila) 
        {
        ?>
            <tr>
                <td><?php echo $fila->profesor_id; ?></td>
                <td><?php echo $fila->asinatura_id; ?></td>
                <td><?php echo $fila->clase; ?></td>
                <td><?php echo $fila->horario; ?></td>
                <td><?php echo $fila->duracion; ?></td>
                <td>
                <button class = "editar" 
                onclick = "location.href = 'impartirModificar.php?o=<?php echo MODIFICAR;?>&id=<?php echo $fila->impartir_id;?>'"><i class="fas fa-user-edit"></i></button>
                <button name="borrar" class="borrar"
                tag = '../controllers/Cinsertar.php?o=<?php echo BORRAR;?>&id=<?php echo $fila->impartir_id;?>'><i class="fas fa-trash"></i></button>
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
                                onclick= "location.href = 'impartirInsertar.php'"><i class="fas fa-user-plus"></i></button></td>
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