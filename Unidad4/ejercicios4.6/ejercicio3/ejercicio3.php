<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            text-align: center;
        }

        table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
        }

        img {
            width: 250px;
            display: block;
        }
    </style>
</head>

<body>
    <h2>Adivina la imagen</h2>
    <?php
    $intentos = isset($_GET['intentos']) ? (int)$_GET['intentos'] : 0;
        echo "<h3>Llevas  $intentos intentos</h3>";

    ?>
    <!-- Tabla donde aparecerá cada trozo de imagen que se podrá clicar para revelar -->
    <table border="1px">
        <tr>
            <td><a href="descubre3.php?num=1&intentos=<?=$intentos?>"><img src="img/gris.jpg"></a></td>
            <td><a href="descubre3.php?num=2&intentos=<?=$intentos?>"><img src="img/gris.jpg"></a></td>
            <td><a href="descubre3.php?num=3&intentos=<?=$intentos?>"><img src="img/gris.jpg"></a></td>
        </tr>
        <tr>
            <td><a href="descubre3.php?num=4&intentos=<?=$intentos?>"><img src="img/gris.jpg"></a></td>
            <td><a href="descubre3.php?num=5&intentos=<?=$intentos?>"><img src="img/gris.jpg"></a></td>
            <td><a href="descubre3.php?num=6&intentos=<?=$intentos?>"><img src="img/gris.jpg"></a></td>
        </tr>
        <tr>
            <td><a href="descubre3.php?num=7&intentos=<?=$intentos?>"><img src="img/gris.jpg"></a></td>
            <td><a href="descubre3.php?num=8&intentos=<?=$intentos?>"><img src="img/gris.jpg"></a></td>
            <td><a href="descubre3.php?num=9&intentos=<?=$intentos?>"><img src="img/gris.jpg"></a></td>
        </tr>
    </table>
    <br><br>
    <!-- Formulario para enviar la respuesta y comprobar si es correcta -->
    <form action="comprueba3.php" method="post">
        <input type="text" name="respuesta" required>
        <!-- Input hidden para mantener el número de intentos -->
        <input type="hidden" name="intentos" value="<?= $intentos?>">
        <input type="submit" value="Comprobar">
    </form>
</body>

</html>