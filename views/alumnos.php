<?php
session_start();
require_once("../models/CalumnosBD.php");
require_once("../constants/constants.inc.php");
$alumno = new CAlumnosBD();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <title>Alumnos</title>
</head>
<body>
<?php require_once('menu.php'); ?> 
<table>
    <tr>
        <th>n_matricula</th>
        <th>nombre</th>
        <th>apellidos</th>
        <th>Email</th>
        <th>telefono</th>
        <th>telefono2</th>
        <th>DAW</th>
        <th>DAM</th>
        <th>presencial</th>
        <th>curso</th>
        <th>Opciones</th>
    </tr>
    <?php
    if($alumno->seleccionar())
    {
        foreach($alumno->filas as $fila) 
        {
        ?>
            <tr>
                <td><?php echo $fila->n_matricula; ?></td>
                <td><?php echo $fila->nombre; ?></td>
                <td><?php echo $fila->apellidos; ?></td>
                <td><?php echo $fila->email; ?></td>
                <td><?php echo $fila->telefono; ?></td>
                <td><?php echo $fila->telefono2; ?></td>
                <td><?php echo $fila->DAW; ?></td>
                <td><?php echo $fila->DAM; ?></td>
                <td><?php echo $fila->presencial; ?></td>
                <td><?php echo $fila->curso; ?></td>
                <td>
                <button class = "editar" 
                onclick = "location.href = 'alumnoModificar.php?o=<?php echo MODIFICAR;?>&id=<?php echo $fila->alumno_nia;?>'"><i class="fas fa-user-edit"></i></button>
                <button name="borrar" class="borrar"
                tag = '../controllers/Calumnos.php?o=<?php echo BORRAR;?>&id=<?php echo $fila->alumno_nia;?>'><i class="fas fa-trash"></i></button>
                </td>
                <?php
            }//foreach
                ?>
            </tr>
        <?php
    } //if
    ?>
            <tr>
                <td colspan="6"><button style="width: 130px; height: 38px; margin: 3px;  text-decoration: none;
                                              padding: 10px; font-weight: 600; color: #ffffff; background-color: green; border-radius: 6px; border: 2px solid #ffffff"
                                onclick= "location.href = 'alumnoInsertar.php'"><i class="fas fa-user-plus"></i></button></td> 
                <td colspan="5"><a href = "../reports/alumnosPDF.php"><i class="fas fa-file-pdf fa-lg"></i></a></td>              
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