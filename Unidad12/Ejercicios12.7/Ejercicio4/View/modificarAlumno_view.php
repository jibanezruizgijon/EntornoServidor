<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Añadir Alumno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>	
</head>

<body>
    <form action="../../Controller/alumno/actualizarAlumno.php" method="POST">
        <label for="">Matrícula:</label>
        <input type="text" name="matricula" value="<?= $data['alumno']->getMatricula() ?>" readonly><br><br>
        <label for="">Nombre:</label>
        <input type="text" name="nombre" value="<?= $data['alumno']->getNombre() ?>"><br><br>
        <label for="">Apellidos:</label>
        <input type="text"name="apellidos" value="<?= $data['alumno']->getApellidos() ?>"><br><br>
        <label for="">Curso:</label>
        <input type="text" name="curso" value="<?= $data['alumno']->getCurso() ?>"><br><br>
        <hr> <input type="submit" value="Aceptar">
    </form>
    <br>
    <a href="../../Controller/index.php">Volver</a>
</body>

</html>