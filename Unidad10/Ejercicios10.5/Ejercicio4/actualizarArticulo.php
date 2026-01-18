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
    <link rel="stylesheet" href="css/actualizar.css">
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
        
        <a href="Ejercicio4.php" class="btn-back">Volver al listado</a>
    <?php
    }
    $conexion = null;
    ?>
</div>

</body>
</html>