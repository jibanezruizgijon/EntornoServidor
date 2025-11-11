<?php
if (session_status() == PHP_SESSION_NONE) session_start();
$fechaHoy = date("d/m/Y");

if (!isset($_SESSION['libros'])) {
    $_SESSION['libros'] = [];
    $_SESSION['sancion'] = 0;
}

if (isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];

    $fechaDevolucion = strtotime("$fecha +7 days");
    $fechaRestante = time() - $fechaDevolucion;
    $fechaFormato = strtotime($fecha);

    $fechaPrestamo = date("d/m/Y", $fechaFormato);
    $fechaDevolucion = date("d/m/Y", $fechaDevolucion);
    if ($fechaRestante < 0) {
        $fechaRestante = "RETRASADO, sanción acumulada de 2€";
        $_SESSION['sancion']+= 2;
    } else {
        $fechaRestante = date("d",  $fechaRestante);
    }


    $_SESSION['libros'][] = [
        "titulo" => $titulo,
        "prestamo" => $fechaPrestamo,
        "devolucion" => $fechaDevolucion,
        "restante" => $fechaRestante,
    ];
}

if (isset($_POST['devolver'])) {
    $libroDevuelto = $_POST['devolver'];
    foreach ($_SESSION['libros'] as $libro => $datos) {
        if ($datos['titulo'] == $libroDevuelto) {
            unset($_SESSION['libros'][$libro]);
        }
    }
}
// Una cookie para el array de la tabla con los datos de los libros
// Una cookie para la deuda por sanciones
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
                <td <?= (strpos($datos['restante'], "RETRASADO") !== false) ? "style='color:red;'" : "style='color:black;'"; ?>><?= $datos['restante'] ?> días</td>
            </tr>
        <?php
        }
        ?>

    </table>
</body>

</html>