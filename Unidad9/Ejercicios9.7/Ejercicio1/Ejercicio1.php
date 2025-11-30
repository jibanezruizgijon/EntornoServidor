<?php
include_once "Empleado.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Alta de empleados</h1>

    <form action="" method="post">
        <label>Introduce el nombre:</label>
        <input type="text" name="nombre">
        <label>Introduce el sueldo:</label>
        <input type="number" name="sueldo">
        <input type="submit" value="Registrar">
    </form>
    <?php
    if (isset($_POST['nombre'])) {
        $empleado1 = new Empleado($_POST['nombre'], $_POST['sueldo']);
        echo $empleado1->impuestos();
        echo "<br>";
        echo $empleado1;
        echo "<br>";
        $empleado1->asigna($_POST['nombre'], 2000);
        echo $empleado1->impuestos();
    }
    ?>
</body>

</html>