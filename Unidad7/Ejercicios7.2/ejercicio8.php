<?php
 if ( session_status() == PHP_SESSION_NONE) { session_start(); }
// Usar el array_rand($array, $num)
if (!isset($_SESSION['diccionario'])) {
    $_SESSION['diccionario']= [
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

$PalabrasAzar = array_rand($_SESSION['diccionario'], 5);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio8</title>
</head>

<body>
    <h1>Introduzca la traducción al inglés de estas palabras</h1>

    <?php
    if (!isset($_POST['palabra'])) {


        foreach ($PalabrasAzar as $indice => $palabra) {
    ?>
            <form action="" method="post">
                <label><?= $palabra ?>:</label>
                <input type="text" name="palabra[]">
            </form>
            <br>
    <?php
        }
    }
    ?>

    <form action="" method="post">
        <input type="hidden" name="corregir">
        <input type="submit" value="Aceptar">
    </form>
    <hr>
    <form action="" method="post">
        <input type="submit" value="Jugar otra vez">
    </form>
    <hr>
    <form action="administrarPalabras.php" method="post">
        <input type="submit" value="Administrar los pares de palabras">
    </form>

</body>

</html>