<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Asignatura</title>
</head>
<body>
    <form action="../../Controller/asignatura/creaAsignatura.php" method="post">
        <label for="">Código:</label>
        <input type="text" value="Autonumérico" readonly>
        <input type="text" name="nombre" required>
        <input type="submit" name="crear" value="Crear">
    </form>
    <a href="../../Controller/asignatura/mostrarAsignaturas.php">Volver</a>
</body>
</html>