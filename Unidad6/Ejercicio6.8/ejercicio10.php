<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio10</title>
</head>

<body>
    <?php
    if (isset($_GET['nombre'])) {
        $palabra =  ucfirst(trim($_GET['nombre']));
        $contadorPrimero = strpos($palabra, " ");
        $contadorUltimo = strrpos($palabra, " ");
        $palabra1 =  ucfirst(substr($palabra, 0, $contadorPrimero));
        $palabra2 =  ucfirst(substr($palabra, $contadorPrimero, -$contadorUltimo));
        $palabra3 =  ucfirst(substr($palabra, $contadorUltimo));
        $palabraMayus = $palabra1 . $palabra2 . $palabra3;
        print_r($palabraMayus);
    }

    ?>
    <form action="" method="get">
        <label>Introduce un nombre completo</label>
        <input type="text" name="nombre">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>