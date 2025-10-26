<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4</title>
</head>

<body>
    <?php
    // Verifica si un string leído por teclado finaliza con la misma palabra que empieza. 
    if (isset($_GET['frase'])) {
        $frase = trim(strtolower($_GET['frase']));
        $espacio1 = strpos($frase, " ");
        $palabra1 =  substr($frase, 0, $espacio1);
        if (str_ends_with($frase, $palabra1)) {
            echo "La frase si empieza con la misma palabra que acaba";
        } else {
            echo "La frase no empieza con la misma palabra que acaba";
        }
    }
    ?>
    <form action="" method="get">
        <label>Introduce una frase</label>
        <input type="text" name="frase">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>