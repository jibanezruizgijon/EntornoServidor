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
            "mysql:host=localhost;dbname=banco2;charset=utf8",
            "root",
            "toor"
        );
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    if (isset($_POST['dni'])) {
        $delete = "DELETE FROM cliente WHERE dni='" . $_POST['dni'] . "'";

        $conexion->exec($delete);
        $conexion = null;
        header("location: Ejercicio2.php");
        exit();
    } else {
        echo "<h1>No encuentra el dni del cliente </h1>";
        echo "<a href='Ejercicio2.php'>Volver</a>";
    }
    ?>
</body>

</html>