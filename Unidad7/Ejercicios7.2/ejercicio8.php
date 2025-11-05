<?php
// Usar el array_rand($array, $num)
if (!isset($diccionario)) {
    $diccionario = [
        "silla" => "chair",
        "luna" => "moon",
        "lapiz" => "pencil",
        "car" => "coche",
        "rocket" => "cohete",
        "book" => "libro",
        "mouse" => "ratón",
        "goat" => "cabra",

    ];
    $diccTexto = base64_encode(serialize($diccionario));
    setcookie("diccionario", $diccTexto, time() + 24 * 60 * 60);
}

if (isset($_POST['spain']) && isset($_POST['english'])) {
    
}

$PalabrasAzar = array_rand($diccionario, 5);

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
    foreach ($PalabrasAzar as $indice => $palabra) {
       ?>
        <form action="" method="post">
            <label><?=$palabra?>:</label>
            <input type="text" name="palabra[]" >
        </form> 
       <?php
    }
?>


    <form action="addPalabra.php" method="post">
        <input type="submit" value="Añadir palabras">
    </form>


 

    <form action="" method="post">
        <input type="text" name="">
        <input type="submit" value="Enviar">
    </form>

</body>

</html>