<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['mascotas'])) {
    $_SESSION['mascotas'] = [];
}

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $animal = $_POST['animal'];
    $edad = $_POST['edad'];

    $_SESSION['mascotas'][] = [
        "nombre" => $nombre,
        "animal" => $animal,
        "edad" => $edad
    ];
}

if (isset($_POST['grabar'])) {
    $existeFecha = mirarFecha($fecha);
    $archivo = fopen("mascotas.txt", "a");
    if (!$existeFecha) {
        fwrite($archivo, $fecha . PHP_EOL);
    }
    foreach ($_SESSION['mascotas'] as $mascota => $datos) {
        fwrite($archivo, $datos['nombre']. ".". $datos['animal'] . "-" . $datos['edad']. PHP_EOL);
    }
    fclose($fp);
    session_destroy();
    exit();
}

$fechaHoy =  date("d-m-Y", time());
$fecha = "#" . $fechaHoy . "#";


function mirarFecha($fechaHoy) {
    $archivo = fopen($archivo, "a");
    do {
        //Comprobar fecha

        $linea = trim(fgets($archivo));
    } while ($linea != $fecha && );
    fclose($archivo)
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
    <style>
        * {
            font-family: sans-serif;
        }

        table,
        tr,
        td,
        th {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th colspan="4">Fecha:<?= $fecha  ?></th>
        </tr>
        <tr>
            <td>Nombre</td>
            <td>Animal</td>
            <td>Edad</td>
            <td></td>
        </tr>
        <?php
        foreach ($_SESSION['mascotas'] as $mascota => $datos) {
        ?>
            <tr>
                <td><?= $datos["nombre"] ?></td>
                <td><?= $datos["animal"] ?></td>
                <td><?= $datos["edad"] ?></td>
                <td></td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <form action="" method="post">
                <td><input type="text" name="nombre" required></td>
                <td><input type="text" name="animal" required></td>
                <td><input type="number" name="edad" required></td>
                <td><input type="submit" value="añadir"></td>
            </form>
        </tr>
    </table>
    <br><br>
    <form action="" method="post">
        <label>Grabar las mascotas en el fichero:</label>
        <input type="submit" name="grabar" value="Grabar">
    </form>

    <?php
    if (isset($_SESSION['mascotas'])) {
        print_r($_SESSION['mascotas']);
    }
    ?>
</body>

</html>