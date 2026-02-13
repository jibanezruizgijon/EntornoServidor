<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>

<body>
    <h1>Regístrate</h1>
    <form action="../Controller/comprobarregistro.php" method="post">
        <label for="">Nombre*</label><br>
        <input type="text" name="nombre" required>
        <br><br>
        <input type="submit" name="registrar" value="Registrarse">
    </form>
</body>

</html>