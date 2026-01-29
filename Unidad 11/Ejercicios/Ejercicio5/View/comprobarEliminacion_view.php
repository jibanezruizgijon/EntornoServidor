<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container text-center">
        <h1>¿Estás seguro que quieres eliminar el producto?</h1>
        <a class="btn btn-success" href="../Controller/eliminarProducto.php?id=<?= $_POST['id'] ?>">Confirmar</a>
        <a class="btn btn-info" href="../Controller/indexAdmin.php">Volver</a>
    </div>
</body>

</html>