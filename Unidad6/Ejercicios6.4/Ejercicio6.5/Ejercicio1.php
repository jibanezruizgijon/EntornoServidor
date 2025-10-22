<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loteria Primitiva</title>
    <style>
        .espacio {
            width: 40px;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['numeros'])) {
        $numeros = $_GET['numeros'];

        print_r($numeros);
    }
    ?>
    <h1>Lotería Primitiva</h1>
    <h3>Introduce 6 números (entre 1 y 49)</h3> 
    
    <form action="Ejercicio1.1.php" method="get">
        <input class="espacio" type="number" name="numeros[]">
        <input class="espacio" type="number" name="numeros[]">
        <input class="espacio" type="number" name="numeros[]">
        <input class="espacio" type="number" name="numeros[]">
        <input class="espacio" type="number" name="numeros[]">
        <input class="espacio" type="number" name="numeros[]">
        <br><br>
        <label>Numero de serie(entre 1 y 9999):</label>
        <input class="espacio" type="number" name="numeros[]">
        <br><br>
        <label>Título de la combinación</label>
        <input type="text" name="titulo">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>