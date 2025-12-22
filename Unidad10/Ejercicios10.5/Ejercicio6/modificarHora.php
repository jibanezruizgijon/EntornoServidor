<?php
try {
    $conexion = new PDO("mysql:host=localhost;dbname=gestimal;charset=utf8", "root", "toor");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}

if (isset($_POST['enviar'])) {
    $actualizar = "UPDATE horario SET $_POST[hora]='{$_POST['asignatura']}' WHERE dia='{$_POST['dia']}'";
    $conexion->exec($actualizar);
    $conexion = null;

    header("location: Ejercicio6.php");
    exit();
}

$asignaturas = [];
$consulta = $conexion->query("SELECT primera, segunda, tercera, cuarta, quinta, sexta FROM horario");
while ($dia = $consulta->fetchObject()) {
    if (!in_array($dia->primera, $asignaturas)) {
        $asignaturas[] = $dia->primera;
    }
    if (!in_array($dia->segunda, $asignaturas)) {
        $asignaturas[] = $dia->segunda;
    }
    if (!in_array($dia->tercera, $asignaturas)) {
        $asignaturas[] = $dia->tercera;
    }
    if (!in_array($dia->cuarta, $asignaturas)) {
        $asignaturas[] = $dia->cuarta;
    }
    if (!in_array($dia->quinta, $asignaturas)) {
        $asignaturas[] = $dia->quinta;
    }
    if (!in_array($dia->sexta, $asignaturas)) {
        $asignaturas[] = $dia->sexta;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Hora</title>
</head>

<body>
    <form action="" method="post">
        <label for="horario">Cambiar asigantura</label>
        <input type="hidden" name="dia" value="<?= $_REQUEST['dia'] ?>">
        <input type="hidden" name="hora" value="<?= $_REQUEST['hora'] ?>">
        <select name="asignatura">
        <?php
          foreach ($asignaturas as $asig) {
            echo "<option value='$asig'>$asig</option>";
          }  
        ?>
        </select>
        <input type="submit" name="enviar" value="Confirmar">
    </form>
    <a href="Ejercicio6.php">Volver</a>
    <?php $conexion = null; ?>
</body>

</html>