<?php
include_once "Nota.php";

if (session_status() == PHP_SESSION_NONE) session_start();

// En caso de entrar sin inicar sesión antes
if (!isset($_SESSION['user'])) {
    header("Location:login.php");
    exit();
}

// En caso de cerrar Sesión
if (isset($_POST['cerrar'])) {
    session_destroy();
    header("Location:login.php");
    exit();
}

if (!isset($_SESSION['notas'])) {
    $_SESSION['notas'] = [];
}
$NotasGuardadas = [];

if (isset($_POST['titulo'])) {
    $titulo = $_POST['titulo'];
    $texto =  $_POST['texto'];

    $notaNueva = new Nota($titulo, $texto);
    $_SESSION['notas'][$_SESSION['user']][] = base64_encode(serialize($notaNueva));


    foreach ($_SESSION['notas'] as $user => $notas) {
        $NotasGuardadas[] = unserialize(base64_decode($user));
    }
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
            echo $_SESSION['ultima'];
        } else {
        ?>
            Ninguna nota registrada
        <?php
        }
        ?></p>
    <p><strong>Fecha:</strong>
        <?php
        if ($_SESSION['fecha'] != "") {
            echo $_SESSION['fecha'];
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

                    foreach ($NotasGuardadas as $nota => $datos) {
                        $contadorNota = 0;
                        $arrayFecha = explode("-", $datos->getCreacion());
                        echo "<tr>";
                        echo "<td><a href='?contador=$contadorNota'>" . $datos->getTitulo() . "</a></td>";
                        echo "<td>" . $arrayFecha[0] . "</td>";
                        echo "<td>" . $arrayFecha[1] . "</td>";
                        echo "</tr>";
                        $contadorNota++;
                    }
                    ?>
                    </tbody>
                </table>
            </td>

            <?php
            if (isset($_GET['contador'])) {
            ?>
                <td>
                    <h2>Titulo</h2>
                    <p>Texto</p>
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
    <form action="" method="post">
        <input type="submit" name="cerrar" value="CERRAR SESIÓN">
    </form>
</body>

</html>