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
        <tr>
            <td><a href="descubre.php?num=1"><img src="img/gris.jpg"></a></td>
            <td><a href="descubre.php?num=2"><img src="img/gris.jpg"></a></td>
            <td><a href="descubre.php?num=3"><img src="img/gris.jpg"></a></td>
        </tr>
        <tr>
            <td><a href="descubre.php?num=4"><img src="img/gris.jpg"></a></td>
            <td><a href="descubre.php?num=5"><img src="img/gris.jpg"></a></td>
            <td><a href="descubre.php?num=6"><img src="img/gris.jpg"></a></td>
        </tr>
        <tr>
            <td><a href="descubre.php?num=7"><img src="img/gris.jpg"></a></td>
            <td><a href="descubre.php?num=8"><img src="img/gris.jpg"></a></td>
            <td><a href="descubre.php?num=9"><img src="img/gris.jpg"></a></td>
        </tr>
    </table>
    <br><br>
    <!-- Formulario para enviar la respuesta y comprobar si es correcta -->
    <form action="comprueba.php" method="post">
        <input type="text" name="respuesta" required>
        <input type="submit" value="Comprobar">
    </form>
</body>

</html>