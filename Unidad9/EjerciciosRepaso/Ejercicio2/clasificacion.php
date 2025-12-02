<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include_once 'Liga.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="2px dashed black">
        <tr>
            <th>Equipo</th>
            <th>Estadio</th>
            <th>Puntuación</th>
            <th>Propietario</th>
        </tr>
        <?php
        if (isset($_SESSION['liga'])) {
            foreach ($_SESSION['liga'] as $propietario => $ligas) {
                foreach ($ligas as $liga) {
                    $liga = unserialize($liga);
                    echo '<tr>';
                    echo '<td>' . $liga->getEquipo() . '</td>';
                    echo '<td>' . $liga->getEstadio() . '</td>';
                    echo '<td>' . rand(1, 70) . '</td>';
                    echo '<td>' . $propietario. '</td>';
                    echo '</tr>';
                }
            }
        } else {
            echo '<tr><td colspan="4">No hay equipos asociados al usuario.</td></tr>';
        }
        ?>
    </table>
    <h3>Hay un total de jugadores en la liga de <?=Liga::totalJugadores()?> jugadores</h3>
    <a href="login.php">Regresar al login</a>
</body>

</html>