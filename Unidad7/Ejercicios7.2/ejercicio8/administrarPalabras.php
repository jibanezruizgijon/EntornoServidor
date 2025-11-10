<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Para eliminar las cookies y reiniciar las palabras por defecto
if (isset($_POST['reiniciar'])) {
    setcookie("diccionario", "", -1);

     $_SESSION['diccionario'] = [
        "silla" => "chair",
        "luna" => "moon",
        "lapiz" => "pencil",
        "coche" => "car",
        "cohete" => "rocket",
        "libro" => "book",
        "ratón" => "mouse",
        "cabra" => "goat",
    ];
    $diccTexto = base64_encode(serialize($_SESSION['diccionario']));
    setcookie("diccionario", $diccTexto, time() + 60 * 60);
}

if (isset($_POST['spain']) && isset($_POST['english'])) {

    $_SESSION['diccionario'] = unserialize(base64_decode($_COOKIE["diccionario"]));

    $_SESSION['diccionario'][$_POST['spain']] = $_POST['english'];

    $diccTexto = base64_encode(serialize($_SESSION['diccionario']));
    setcookie("diccionario", $diccTexto, time() + 60 * 60);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Palabras</title>
    <style>
        div {
            display: flex;
        }

        form {
            margin-left: 20px;
        }
        table, tr, td, th{
            padding: 6px;
            border: 1px solid;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h1>Administración de palabras</h1>
    <hr>
    <div>
        <form action="addPalabra.php" method="post">
            <input type="submit" value="Añadir nueva palabra">
        </form>

        <form action="" method="post">
            <input type="hidden" name="reiniciar">
            <input type="submit" value="Reiniciar a diccionario por defecto">
        </form>

        <form action="ejercicio8.php" method="post">
            <input type="submit" value="Regresar a página principal">
        </form>
    </div>

    <hr>

    <table>
        <tr>
            <th>Inglés</th>
            <th>Español</th>
        </tr>
        <?php
        foreach ($_SESSION['diccionario'] as $palabra => $traduccion) {
            echo "<tr>";
            echo "<td>" . $palabra . "</td>";
            echo "<td>" . $traduccion . "</td>";
            echo "<tr>";
        }
        ?>
    </table>
</body>

</html>