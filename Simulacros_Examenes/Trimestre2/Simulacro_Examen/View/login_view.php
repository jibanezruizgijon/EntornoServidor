<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        h2{
            color: red;
        }
    </style>
</head>

<body>
    <h1>Login</h1>

    <form action="../Controller/comprobarLogin.php" method="post">
        <label for="">Nombre*</label><br>
        <input type="text" name="nombre" required>
        <br><br>
        <input type="submit" name="iniciar" value="Iniciar sesión">
    </form>
    <h2 ><?= $mensajeError ?></h2>
    <h3>Regístrate si todavía no has iniciado sesión</h3>
    <a href="../Controller/registrarse.php">Registrarse</a>


</body>

</html>