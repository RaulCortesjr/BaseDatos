<?php
session_start();
require_once("../models/CprofesoresBD.php");
require_once("../constants/constants.inc.php");
$profesor = new CProfesoresBD();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <title>Profesores</title>
</head>
<body>
<?php require_once('menu.php'); ?> 
<br><br>
<table>
    <tr>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Telefono</th>
        <th>Email</th>
        <th>dirección</th>
        <th>CP</th>
        <th>Población</th>
        <th>Provincia</th>
        <th>Opciones</th>
    </tr>
    <?php
    if($profesor->seleccionar())
    {
        foreach($profesor->filas as $fila) 
        {
        ?>
            <tr>
                <td><?php echo $fila->dni; ?></td>
                <td><?php echo $fila->nombre; ?></td>
                <td><?php echo $fila->apellidos; ?></td>
                <td><?php echo $fila->telefono; ?></td>
                <td><?php echo $fila->email; ?></td>
                <td><?php echo $fila->direccion; ?></td>
                <td><?php echo $fila->cp; ?></td>
                <td><?php echo $fila->poblacion; ?></td>
                <td><?php echo $fila->provincia; ?></td>
                <td>
                <button class = "editar" 
                onclick = "location.href = 'profesoresModificar.php?o=<?php echo MODIFICAR;?>&id=<?php echo $fila->profesor_id;?>'"><i class="fas fa-user-edit"></i></button>
                <button name="borrar" class="borrar"
                tag = '../controllers/Cprofesores.php?o=<?php echo BORRAR;?>&id=<?php echo $fila->alumno_nia;?>'><i class="fas fa-trash"></i></button>
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
                                onclick= "location.href = 'profesoresInsertar.php'"><i class="fas fa-user-plus"></i></button></td>
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