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
    // Comprueba si ya existe un cliente con el DNI introducido
    $consulta = $conexion->query("SELECT dni FROM cliente WHERE dni='" . $_POST['dni'] . "'");
    if ($consulta->rowCount() > 0) {
    ?>
        Ya existe un cliente con DNI <?= $_POST['dni'] ?><br>
        Por favor, vuelva a la <a href="Ejercicio1.php">página de alta de
            cliente</a>.
    <?php
    } else {
        $insercion = "INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES
('$_POST[dni]','$_POST[nombre]','$_POST[direccion]','$_POST[telefono]')";
        
        $conexion->exec($insercion);
        $conexion = null;
        header("location: Ejercicio1.php");
        exit();
    }
    ?>
</body>

</html>