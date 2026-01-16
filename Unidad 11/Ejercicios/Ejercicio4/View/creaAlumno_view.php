<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Añadir Alumno</title>
</head>

<body>
    <h1>Nuevo Alumno</h1>
    <form action="../Controller/creaAlumno.php" method="POST">
        <label for="">Matrícula:</label>
        <input type="text" name="matricula"><br><br>
        <label for="">Nombre:</label>
        <input type="text" name="nombre"><br><br>
        <label for="">Apellidos:</label>
        <input type="text"name="apellidos"><br><br>
        <label for="">Curso:</label>
        <input type="text" name="curso"><br><br>
        <hr> <input type="submit" value="Aceptar">
    </form>
    <br>
    <a href="../Controller/index.php">Volver</a>
</body>

</html>