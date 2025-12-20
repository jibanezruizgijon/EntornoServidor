<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <?php
    // Conexión a la base de datos
    try {
        $conexion = new PDO(
            "mysql:host=localhost;dbname=gestimal;charset=utf8",
            "root",
            "toor"
        );
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    // Comprueba si ya existe un artículo con el código introducido
    $consulta = $conexion->query("SELECT codigo FROM articulo WHERE codigo='" . $_POST['codigo'] . "'");
    if ($consulta->rowCount() > 0) {
    ?>
        Ya existe un artículo con el código<?= $_POST['codigo'] ?><br>
        Por favor, vuelva a la <a href="Ejercicio4.php">página GESTIMAL</a>.
    <?php
    } else {
        $margen = floatval($_POST['precioVenta']) - floatval($_POST['precioCompra']);
        $insercion = "INSERT INTO articulo (codigo, descripcion, precioCompra, precioVenta, margen, stock) VALUES
('$_POST[codigo]','$_POST[descripcion]','$_POST[precioCompra]','$_POST[precioVenta]', $margen,'$_POST[stock]')";
        //echo $insercion;
        $conexion->exec($insercion);
        $conexion = null;
        header("location: Ejercicio4.php");
        exit();
    }
    ?>
</body>

</html>