<?php
// $actualizar = "UPDATE cliente SET dni ='" .$_POST['dni'] ."', nombre ='" .$_POST['nombre'] ."', direccion ='" .$_POST['direccion'] ."', telefono ='" .$_POST['telefono'] ."' WHERE dni='" . $_POST['dni'] . "'";


if (isset($_POST['dni']) && isset($_POST['nombre'])) {

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

    $actualizar = "UPDATE cliente SET dni='{$_POST['dni']}', nombre='{$_POST['nombre']}', direccion='{$_POST['direccion']}', telefono='{$_POST['telefono']}' WHERE id='{$_POST['id']}'";
    $conexion->exec($actualizar);
    $conexion = null;

    header("location: Ejercicio2.php");
    exit();
}
?>

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
    if (isset($_POST['id']) && !isset($_POST['nombre'])) {
        $consulta = $conexion->query("SELECT dni, nombre, direccion, telefono FROM cliente WHERE id='" . $_POST['id'] . "'");
        $cliente = $consulta->fetchObject();
    ?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
            <input type="text" name="dni" value="<?= $cliente->dni ?>" required>
            <input type="text" name="nombre" value="<?= $cliente->nombre ?>" required>
            <input type="text" name="direccion" value="<?= $cliente->direccion ?>" required>
            <input type="text" name="telefono" value="<?= $cliente->telefono ?>" required>
            <input type="submit" value="Confirmar">
        </form>
        <a href="Ejercicio2.php">Volver</a>
    <?php
    }
    $conexion = null;
    ?>
</body>

</html>