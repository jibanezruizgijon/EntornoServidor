<?php

use function PHPSTORM_META\type;

if (session_status() == PHP_SESSION_NONE) session_start();
$fechaHoy = date("d/m/Y");

if (isset($_COOKIE['libros']) && !isset($_SESSION['libros']) && isset($_COOKIE['sancion'])) {
    $_SESSION['sancion'] = unserialize(base64_decode($_COOKIE['sancion']));
    $_SESSION['libros'] = unserialize(base64_decode($_COOKIE['libros']));
}

if (!isset($_SESSION['libros'])) {
    $_SESSION['libros'] = [];
    $_SESSION['sancion'] = 0;
    setcookie("sancion", $_SESSION['sancion'], time() + 12 * 30 * 7 * 34 * 60 * 60);
}
$dias = 0;
$sancion = 0;
if (isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $fechaDevolucion = strtotime("$fecha +7 days");
    $hoy = strtotime(date("m/d/Y"));
    $fechaRestante = $hoy - $fechaDevolucion;
    $fechaFormato = strtotime($fecha);
    $fechaPrestamo = date("d/m/Y", $fechaFormato);
    $fechaDevolucion1 = date("d/m/Y", $fechaDevolucion);

    if ($fechaRestante < 0) {
        $dias = ($hoy - $fechaDevolucion) / (60 * 60 * 24);
        $dias = abs($dias);
        $sancion = 2 * $dias;
        $fechaRestante = abs($fechaRestante);
        $fechaRestante = date("d",  $fechaRestante);
        $dineroAcumulado = $fechaRestante * 2;
        $mensajeRestante = "RETRASADO, sanción acumulada de " . $dineroAcumulado . "€";
    } else {
        $mensajeRestante = date("d",  $fechaRestante);
    }

    $_SESSION['libros'][] = [
        "titulo" => $titulo,
        "prestamo" => $fechaPrestamo,
        "devolucion" => $fechaDevolucion1,
        "restante" => $mensajeRestante,
    ];
    $librosTxt = base64_encode(serialize($_SESSION['libros']));
    setcookie("libros", $librosTxt, time() + 12 * 30 * 7 * 34 * 60 * 60);
}

if (isset($_POST['devolver'])) {
    $libroDevuelto = $_POST['devolver'];
    foreach ($_SESSION['libros'] as $libro => $datos) {
        if ($datos['titulo'] == $libroDevuelto) {
            if (strpos($datos['restante'], "RETRASADO") !== false) {
                $_SESSION['sancion'] += $sancion; //Añadir el numero de dias acumulados
            }
            unset($_SESSION['libros'][$libro]);
        }
    }


    $librosTxt = base64_encode(serialize($_SESSION['libros']));
    setcookie("libros", $librosTxt, time() + 12 * 30 * 7 * 34 * 60 * 60);
    setcookie("sancion", $_SESSION['sancion'], time() + 12 * 30 * 7 * 34 * 60 * 60);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4</title>
    <style>
        table,
        th,
        tr,
        td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <h1>Control de libros prestados. Hoy es <?= $fechaHoy  ?></h1>

    <?php
    // CÓDIGO DE PRUEBAS
    if ($_SESSION['sancion'] > 0) {
        echo "<h2>Deuda por sanciones: " . ($_SESSION['sancion'])  .  "€</h2>";
    }
    ?>

    <form action="" method="post">
        <label>Título:</label>
        <input type="text" name="titulo" required>
        <label>Fecha:</label>
        <input type="date" name="fecha" required>
        <input type="submit" value="Realizar préstamo">
    </form>
    <hr>
    <table>
        <tr>
            <th>Devolver</th>
            <th>Título</th>
            <th>Préstamo</th>
            <th>Devolución</th>
            <th>Días restantes</th>
        </tr>
        <?php
        foreach ($_SESSION['libros'] as $libros => $datos) {
        ?>
            <tr>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="devolver" value="<?= $datos['titulo'] ?>">
                        <input type="submit" value="DEVOLVER">
                    </form>
                </td>
                <td><?= $datos['titulo'] ?></td>
                <td><?= $datos['prestamo'] ?></td>
                <td><?= $datos['devolucion'] ?></td>
                <td <?= (strpos($datos['restante'], "RETRASADO") !== false) ? "style='color:red;'" : "style='color:black;'"; ?>><?= $datos['restante'] ?> dias</td>
            </tr>
        <?php
        }
        ?>

    </table>
</body>

</html>