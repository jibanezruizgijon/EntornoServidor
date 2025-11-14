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
    <!-- Tabla donde aparecerá cada trozo de imagen que se podrá clicar para revelar -->
    <table>
        <?php
        $suma = 1;
        for ($i = 1; $i <= 3; $i++) {
        ?>
            <tr>
                <?php
                for ($j = 1; $j <= 3; $j++) {
                ?>
                    <td><a href="descubre6.php?num=<?=$suma?>"><img src="img/gris.jpg"></a></td>
                <?php
                    $suma++;
                }
                ?>
            </tr>
        <?php 
        }
        ?>
    </table>
    <br><br>
    <!-- Formulario para enviar la respuesta y comprobar si es correcta -->
    <form action="comprueba6.php" method="post">
        <input type="text" name="respuesta" required>
        <input type="submit" value="Comprobar">
    </form>
</body>

</html>