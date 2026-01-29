<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container text-center">
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
    </div>
    <?= $mensajeError ?>
</body>

</html>