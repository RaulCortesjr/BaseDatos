<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Filtro:</h1>
    <form action="../controllers/consultaProfesores.php" method="POST">
    <fieldset>
        <legend>Profesores</legend>
            <label>Nombre:</label>
            <input type="text" name="nombre" placeholder = "profesor" value = " ">
            <br><br>
            <label>Apellidos:</label>
            <input type="text" name="apellidos" placeholder = "apellidos" value = " ">
            <br><br>
            <label>Email:</label>
            <input type="text" name="email" placeholder = "email" value = " ">
            <br><br>
            <label>Direccion:</label>
            <input type="text" name="direccion" placeholder = "direccion" value = " ">
            <br><br>
            <label>CP:</label>
            <input type="text" name="cp" placeholder = "cp" value = " ">
            <br><br>
            <label>Población:</label>
            <input type="text" name="poblacion" placeholder = "poblacion" value = " ">
            <br><br>
            <label>Provincia:</label>
            <input type="text" name="provincia" placeholder = "provincia" value = " ">
    </fieldset>
    <fieldset>
        <legend>Imparte</legend>
            <label>Clase:</label>
            <input type="text" name="clase" placeholder = "clase" value = " ">
    </fieldset>
    <fieldset>
        <legend>Asignaturas:</legend>
            <label>Nombre:</label>
            <input type="text" name="nombreAsignatura" placeholder = "nombre" value = " ">
            <br><br>
            <label>Curso:</label>
            <input type="text" name="curso" placeholder = "curso" value = " ">
    </fieldset>
    <input type="submit">
    </form>
</body>
</html>