<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Añadir Alumno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>	
</head>

<body>
    <h1>Nuevo Alumno</h1>
    <form action="../../Controller/alumno/creaAlumno.php" method="POST">
        <label for="">Matrícula:</label>
        <input type="text" name="matricula" value="<?= $data['matricula'] ?>"><br><br>
        <label for="">Nombre:</label>
        <input type="text" name="nombre" value="<?= $data['nombre'] ?>"><br><br>
        <label for="">Apellidos:</label>
        <input type="text"name="apellidos" value="<?= $data['apellidos'] ?>"><br><br>
        <label for="">Curso:</label>
        <input type="text" name="curso" value="<?= $data['curso'] ?>"><br><br>
        <hr> <input type="submit" value="Aceptar">
    </form>
    <h3 style="color: red;"><?= $data['mensaje'] ?></h3>
    <br>
    <a href="../../Controller/index.php">Volver</a>
</body>

</html>