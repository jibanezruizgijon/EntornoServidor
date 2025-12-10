<?php
include_once "Nota.php";

if (session_status() == PHP_SESSION_NONE) session_start();

// En caso de entrar sin inicar sesión antes
if (!isset($_SESSION['user'])) {
    header("Location:login.php");
    exit();
}



if (!isset($_SESSION['notas'])) {
    $_SESSION['notas'] = [];
}

// Así se crea la sesión notas usando de índice cada nombre de ussuario
// Dentro del índice se guardan las notas
if (!isset($_SESSION['notas'][$_SESSION['user']])) {
    $_SESSION['notas'][$_SESSION['user']] = [];
}


$NotasGuardadas = [];

if (isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    $texto =  $_POST['texto'];
    $notaNueva = new Nota($titulo, $texto);
    $_SESSION['notas'][$_SESSION['user']][] = base64_encode(serialize($notaNueva));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Panel de notas del usuario <?= $_SESSION['user'] ?></h1>


    <p><strong>Última nota creada:</strong>
        <?php
        if ($_SESSION['ultima'] != "") {
            echo Nota::getUltima();
        } else {
        ?>
            Ninguna nota registrada
        <?php
        }
        ?></p>
    <p><strong>Fecha:</strong>
        <?php
        if ($_SESSION['fecha'] != "") {
            echo date("d/m/Y-G:i:s", Nota::getFecha());
        } else {
            echo  date("d/m/Y-G:i:s");
        }
        ?></p>

    <table border="1">
        <tr>
            <td>
                <table border="1">
                    <thead>
                        <th>Título</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </thead>

                    <?php

                    foreach ($_SESSION['notas'][$_SESSION['user']] as $i => $nota) {
                        $nota = unserialize(base64_decode($nota));
                        $fechaFormateada = date("d/m/Y|H:i:s", $nota->getCreacion());
                        $arrayFecha = explode("|", $fechaFormateada);
                        echo "<tr>";
                        echo "<td><a href='?numNota=$i'>" . $nota->getTitulo() . "</a></td>";
                        echo "<td>" . $arrayFecha[0] . "</td>";
                        echo "<td>" . $arrayFecha[1] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </td>

            <?php
            if (isset($_REQUEST['numNota'])) {
                $nota = unserialize(base64_decode($_SESSION['notas'][$_SESSION['user']][$_REQUEST['numNota']]))
            ?>
                <td>
                    <h2><?= $nota->getTitulo() ?></h2>
                    <p><?= $nota->getTexto() ?></p>
                </td>
            <?php

            }
            ?>

        </tr>
    </table>
    <hr>
    <h3>Añadir nota nueva</h3>
    <form action="" method="post">
        <label for="titulo">TÍTULO:</label>
        <input type="text" name="titulo" required>
        <br><br>
        <label>TEXTO:</label>
        <textarea name="texto" required></textarea>
        <br><br>
        <input type="submit" value="AÑADIR">
    </form>
    <hr>
    <form action="login.php" method="post">
        <input type="submit" name="cerrar" value="CERRAR SESIÓN">
    </form>
</body>

</html>