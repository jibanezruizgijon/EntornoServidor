<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Añadir Alumno</title>
</head>

<body>
    <h1>Nuevo Alumno</h1>
    <form action="../Controller/creaAlumno.php" enctype="multipart/form-data" method="POST">
        <label for="">Matrícula:</label>
        <input type="text" size="20" name="matricula"><br>
        <label for="">Nombre:</label>
        <input type="text" name="nombre"><br>
        <label for="">Apellidos:</label>
        <input type="text"name="apellidos"><br>
        <label for="">Curso:</label>
        <input type="text" name="curso"><br>
        <hr> <input type="submit" value="Aceptar">
    </form>
    <br>
    <a href="../Controller/index.php">Volver</a>
</body>

</html>