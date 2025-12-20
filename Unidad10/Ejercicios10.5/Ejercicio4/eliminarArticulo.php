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
    if (isset($_POST['codigo'])) {
        $delete = "DELETE FROM articulo WHERE codigo='" . $_POST['codigo'] . "'";

        $conexion->exec($delete);
        $conexion = null;
        header("location: Ejercicio4.php");
        exit();
    } else {
        echo "<h1>No encuentra el código del articulo </h1>";
        echo "<a href='Ejercicio4.php'>Volver</a>";
    }
    ?>
</body>

</html>