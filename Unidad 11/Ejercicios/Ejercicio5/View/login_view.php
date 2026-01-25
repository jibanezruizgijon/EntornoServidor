<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>
    <h1>Inicia Sesión</h1>

    <form action="../Controller/comprobarLogin.php" method="post">
        <label for="">Nombre*</label><br>
        <input type="text" name="nombre" required>
        <br><br>
        <label for="">Contraseña*</label><br>
        <input type="password" name="pass" required>
        <br><br>
        <input type="submit" name="iniciar" value="Iniciar sesión">
    </form>
</body>

</html>