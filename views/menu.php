
<table id="menu">
    <tr>
        <th colspan="8"><i class="fas fa-user fa-lg"></i> <?php echo $_SESSION['usuario']; ?>
            <?php 
            if($_SESSION['rol']) // si es true significa si es 1, y 1 coincide con que es administrador
            {
            ?>
            <i id="corona" class="fas fa-crown fa-lg"></i>
            <?php
            } //if
            ?>
        </th>
    </tr>
    <tr>
        <td ><a href="../controllers/logOut.php">Cerrar sesión  <i class="fas fa-sign-out-alt fa-lg"></i></a></td>
        <td ><a href="usuarios.php">Usuarios <i class="fas fa-users fa-lg"></i></a></td>
        <td ><a href="leyes.html">Leyes <i class="fas fa-copyright fa-lg"></i></a></td>
        <td ><a href="alumnos.php">Alumnos<i class="fas fa-child"></i></a></td>
        <td ><a href="asignaturas.php">Asignaturas<i class="fas fa-calculator"></i></a></td>
        <td ><a href="profesores.php">Profesores<i class="fas fa-chalkboard-teacher"></i></a></td>
        <td ><a href="impartir.php">Impartir<i class="fas fa-school"></i></a></td>
        <td ><a href="main.php">Menu <i class="fas fa-home fa-lg"></i></a></td>
    </tr>
</table>