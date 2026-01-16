<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle</title>
    <style>
        * {
            font-family: sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            margin-bottom: 40px;
        }

        a {
            padding: 10px;
            text-decoration: none;
            color: black;
            border: 1px solid;

        }

        h1 {
            text-align: center;
            font-size: 3em;
            margin: 0;
        }

        .botonCompra {
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=gestimal;charset=utf8", "root", "toor");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    $consulta = $conexion->query("SELECT * FROM tienda7 WHERE id='" . $_REQUEST['id'] . "'");
    $articulo = $consulta->fetchObject();
    ?>

    <div class="container">
        <h1>Detalle</h1>
        <img src="<?= $articulo->imagen ?>" alt="">
        <h2>Producto: <?= $articulo->nombre ?></h2>
        <p><strong>Precio:</strong> <?= $articulo->precio ?></p>
        <p><strong>Descripción:</strong><?= $articulo->descripcion ?></p>
        <form action="meteCarro.php" method="post">
            <input type="hidden" name="id" value="<?= $articulo->id ?>">
            <input type="submit" name="seleccionado1" class="botonCompra" value="Comprar">
        </form>
        <a href="index.php">Volver a la tienda</a>
    </div>
    <?php $conexion = null; ?>
</body>

</html>