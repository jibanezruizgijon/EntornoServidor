<?php
// Mantengo tu lógica exacta de PHP al principio
if (isset($_POST['codigo']) && isset($_POST['stock'])) {
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=gestimal;charset=utf8", "root", "toor");
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

    $actualizar = "UPDATE articulo SET descripcion='{$_POST['descripcion']}', precioCompra='{$_POST['precioCompra']}', precioVenta='{$_POST['precioVenta']}', stock='{$_POST['stock']}' WHERE codigo='{$_POST['codigo']}'";
    $conexion->exec($actualizar);
    $conexion = null;
    header("location: Ejercicio4.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Artículo</title>
    <style>
        /* CSS para mejorar la interfaz */
        body {
            font-family: sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
            font-size: 0.9rem;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box; 
            font-size: 1rem;
        }

        input:focus {
            outline: none;
            border-color: #4a90e2;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.3);
        }

        .btn-submit {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
            margin-top: 1rem;
        }

        .btn-submit:hover {
            background-color: #218838;
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #666;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .btn-back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=gestimal;charset=utf8", "root", "toor");
    } catch (PDOException $e) {
        die("Error de conexión.");
    }

    if (isset($_POST['codigo']) && !isset($_POST['stock'])) {
        $consulta = $conexion->query("SELECT codigo, descripcion, precioCompra, precioVenta, stock FROM articulo WHERE codigo='" . $_POST['codigo'] . "'");
        $articulo = $consulta->fetchObject();
    ?>
        <h1>Modificar: <?= $articulo->codigo ?></h1>
        
        <form action="" method="post">
            <input type="hidden" name="codigo" value="<?= $articulo->codigo ?>">

            <div class="form-group">
                <label>Descripción del artículo</label>
                <input type="text" name="descripcion" value="<?= $articulo->descripcion ?>" required>
            </div>

            <div class="form-group">
                <label>Precio de Compra (€)</label>
                <input type="number" step="0.01" min="0" name="precioCompra" value="<?= $articulo->precioCompra ?>" required>
            </div>

            <div class="form-group">
                <label>Precio de Venta (€)</label>
                <input type="number" step="0.01" min="0" name="precioVenta" value="<?= $articulo->precioVenta ?>" required>
            </div>

            <div class="form-group">
                <label>Stock Actual</label>
                <input type="number" name="stock" value="<?= $articulo->stock ?>" required>
            </div>

            <input type="submit" value="Confirmar Cambios" class="btn-submit">
        </form>
        
        <a href="Ejercicio4.php" class="btn-back">← Volver al listado</a>
    <?php
    }
    $conexion = null;
    ?>
</div>

</body>
</html>