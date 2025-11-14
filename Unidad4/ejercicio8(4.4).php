<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabla</title>
</head>

<body>
    <?php
    $n = $_POST['n'];
    ?>
    <table border="1">
        <tr>
            <th>Tabla de multiplicar de <?=$n ?></th>
        </tr>
        <?php
        for($i = 1; $i <= 10; $i++){
            echo "<tr>
          <td>$n x $i = ", $n*$i ,"</td>
          </tr>";
        }
          
        ?>
    </table>

</body>

</html>