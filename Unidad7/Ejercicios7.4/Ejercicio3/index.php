<?php
  if (session_status() == PHP_SESSION_NONE) session_start();  
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
</head>

<body>
    <table>
        <tr>
            <td rowspan="3">La tiendecita</td>
            <td><a href="Cesta.php">Cesta</a></td>
        </tr>
        <tr>
            <td>Producto</td>
            <td>Precio</td>
            <td>Imagen</td>
            <td></td>
        </tr>
        <tr>
            <td>ratón</td>
            <td>6</td>
            <td><img src="img/raton.jpg"></td>
            <td><form action="" method="post">
                <input type="submit" name="comprar" value="Comprar">
            </form></td>
        </tr>
        <tr>
            <td>Producto</td>
            <td>Precio</td>
            <td>Imagen</td>
            <td></td>
        </tr>
    </table>
</body>

</html>