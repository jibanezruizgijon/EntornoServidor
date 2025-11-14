<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
</head>

<body>
    <?php
    $t1 =  $_POST['t1'];
    $t2 =  $_POST['t2'];
    $t3 =  $_POST['t3'];

    $media = ($t1 + $t2 + $t3) / 3;

    $dif1 = $t1 - $media;
    $dif2 = $t2 - $media;
    $dif3 = $t3 - $media;
    ?>
    
    <table>
        <caption>Comparativa de precios Samsung Galaxy 25</caption>
        <tr>
            <th>Tienda</th>
            <th>precio</th>
            <th>Diferencia con la media</th>
        </tr>
        <tr>
            <td>Tienda 1 </td>
            <td><?= $t1 ?>$</td>

            <td><?= $dif1 ?>$</td>
        </tr>
        <tr>
            <td>Tienda 2 </td>
            <td> <?= $t2 ?>$ </td>
            <td><?= $dif2 ?>$</td>
        </tr>
        <tr>
            <td>Tienda 3 </td>
            <td> <?= $t3 ?>$ </td>
            <td><?= $dif3 ?>$</td>
        </tr>
        <tr>
            <td colspan="2">media </td>
            <td> <?= $media ?>$ </td>
        </tr>
    </table>
</body>

</html>