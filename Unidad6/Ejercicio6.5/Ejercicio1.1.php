<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primitiva</title>
</head>

<body>
    <?php
    $numeros = isset($_GET['numeros']) ? $_GET['numeros'] : "";
    $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : "";

    include_once("funcion1.php.php");

    $numeros = combinacion($numeros);

    // Comprueba que titulo no esté vacio para enviarlo a la función 
    if (!empty($titulo)) {
        imprimeApuesta($numeros, $titulo);
    } else {
        imprimeApuesta($numeros);
    }
    ?>

</body>

</html>