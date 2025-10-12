<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    // Se crean los 20 numeros random y se guardan en el array
    for ($i = 0; $i < 20; $i++) {
        $random = rand(0, 100);
        $numero [$i] = [$random, $random**2, $random**3];
       
    }
    ?>

    <table>
        <tr>
            <td>numero</td>
            <td>cuadrado</td>
            <td>cubo</td>
        </tr>
        <?php
          for ($i=0; $i < 20 ; $i++) { 
            echo "<tr>";
            foreach ($numero[$i] as $n) {
                echo "<td> $n </td>";
            }
            echo "</tr>";
          }  
        ?>
    </table>
</body>

</html>