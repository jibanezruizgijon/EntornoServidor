<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>comprueba</title>
    <style>
        body {
            text-align: center;
        }
        img {
            width: 800px;
        }
    </style>
</head>

<body>
    <?php
    $correcta = "vaca";
    $intentos = $_POST['intentos'];
    // En caso de que acierte muestra la imagen entera
    // En caso de error mostrará un mensaje y un enlace para volver a intentarlo
    $respuesta = $_POST["respuesta"];
    if (!isset($_REQUEST['respuesta'])) {
        echo "Introduce una respuesta";
    } else {

        if ($respuesta === $correcta) {
    ?>
            <h2>Enhorabuena, has acertado en <?=$intentos?> intentos</h2>
            <img src="img/vaca.jpg" alt="vaca">
        <?php
        } else {
        ?>
            <h2>No has acertado. Intento número <?=$intentos++?></h2>
            <a href="ejercicio3.php">volver</a>
    <?php
        }
    }
    ?>
</body>

</html>