<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['diccionario'])) {
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

if (isset($_POST['corregir'])) {
    $palabras = $_POST['palabra'];
    
} else {
    $_SESSION['PalabrasAzar'] = array_rand($_SESSION['diccionario'], 5);
}



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

        echo '<form action="" method="post">';
        foreach ( $_SESSION['PalabrasAzar'] as $indice => $palabra) {
    ?>

            <label><?= $palabra ?>:</label>
            <input type="text" name="palabra[]">

            <br><br>
    <?php
        }
        ?>
          <input type="hidden" name="corregir">
          <input type="submit" value="Aceptar">
          </form>
        <?php
    } else {
        if (isset($_POST['corregir'])) {
           for ($i=0; $i < count( $_SESSION['PalabrasAzar']) ; $i++) { 
            $palabraEsp = $_SESSION["PalabrasAzar"][$i];     
        $traduccion = trim(strtolower($palabras[$i])); 
        $traduccionCorrecta = strtolower($_SESSION['diccionario'][$palabraEsp]); 

        echo "<p>$palabraEsp - $traduccion. ";

        if ($traduccion === $traduccionCorrecta) {
            echo "Correcto ";
        } else {
            echo "Incorrecto  (correcto: $traduccionCorrecta)";
        }
           }
        }
    }
    ?>
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