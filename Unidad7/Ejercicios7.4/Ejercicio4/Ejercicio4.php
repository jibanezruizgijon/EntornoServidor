<?php
if (session_status() == PHP_SESSION_NONE) session_start();
$fechaHoy = date("d/m/Y");

// Inicializar o recuperar datos de sesión/cookies
if (isset($_COOKIE['libros']) && !isset($_SESSION['libros'])) {
    $_SESSION['libros'] = unserialize(base64_decode($_COOKIE['libros']));
}
if (isset($_COOKIE['sancion']) && !isset($_SESSION['sancion'])) {
    $_SESSION['sancion'] = (float)$_COOKIE['sancion'];
}

if (!isset($_SESSION['libros'])) {
    $_SESSION['libros'] = [];
}
if (!isset($_SESSION['sancion'])) {
    $_SESSION['sancion'] = 0;
}

// Procesar nuevo préstamo
if (isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    
    // Convertir fechas a timestamp para cálculos
    $fechaPrestamo = strtotime($fecha);
    $fechaDevolucion = strtotime("$fecha +7 days");
    $hoy = strtotime(date("Y-m-d"));
    
    // Formatear fechas para mostrar
    $fechaPrestamoFormato = date("d/m/Y", $fechaPrestamo);
    $fechaDevolucionFormato = date("d/m/Y", $fechaDevolucion);
    
    // Calcular días restantes y sanción
    $mensajeRestante = "";
    
    if ($hoy > $fechaDevolucion) {
        // Libro retrasado
        $diasRetraso = floor(($hoy - $fechaDevolucion) / (60 * 60 * 24));
        $sancion = 2 * $diasRetraso;
        $mensajeRestante = "RETRASADO, sanción acumulada de " . $sancion . "€";
    } else {
        // Libro en plazo
        $diasRestantes = floor(($fechaDevolucion - $hoy) / (60 * 60 * 24));
        $mensajeRestante = $diasRestantes . " días restantes";
    }
    
    $_SESSION['libros'][] = [
        "titulo" => $titulo,
        "prestamo" => $fechaPrestamoFormato,
        "devolucion" => $fechaDevolucionFormato,
        "restante" => $mensajeRestante,
        "dias_retraso" => isset($diasRetraso) ? $diasRetraso : 0 // Solo guardamos los días de retraso
    ];
    
    // Guardar en cookies
    $librosTxt = base64_encode(serialize($_SESSION['libros']));
    setcookie("libros", $librosTxt, time() + (365 * 24 * 60 * 60));
}

// Procesar devolución
if (isset($_POST['devolver'])) {
    $libroDevuelto = $_POST['devolver'];
    foreach ($_SESSION['libros'] as $indice => $datos) {
        if ($datos['titulo'] == $libroDevuelto) {
            // Sumar sanción si el libro estaba retrasado
            if (strpos($datos['restante'], "RETRASADO") !== false) {
                $sancionLibro = 2 * $datos['dias_retraso'];
                $_SESSION['sancion'] += $sancionLibro;
            }
            unset($_SESSION['libros'][$indice]);
            break;
        }
    }
    
    // Guardar en cookies
    $librosTxt = base64_encode(serialize($_SESSION['libros']));
    setcookie("libros", $librosTxt, time() + (365 * 24 * 60 * 60));
    setcookie("sancion", $_SESSION['sancion'], time() + (365 * 24 * 60 * 60));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4</title>
    <style>
        table, th, tr, td {
            border: 1px solid;
        }
        .retrasado {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Control de libros prestados. Hoy es <?= $fechaHoy ?></h1>

    <?php if ($_SESSION['sancion'] > 0): ?>
        <h2>Deuda por sanciones: <?= $_SESSION['sancion'] ?>€</h2>
    <?php endif; ?>

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
            <th>Estado</th>
        </tr>
        <?php foreach ($_SESSION['libros'] as $datos): ?>
            <tr>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="devolver" value="<?= $datos['titulo'] ?>">
                        <input type="submit" value="DEVOLVER">
                    </form>
                </td>
                <td><?= htmlspecialchars($datos['titulo']) ?></td>
                <td><?= $datos['prestamo'] ?></td>
                <td><?= $datos['devolucion'] ?></td>
                <td class="<?= (strpos($datos['restante'], 'RETRASADO') !== false) ? 'retrasado' : '' ?>">
                    <?= $datos['restante'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>