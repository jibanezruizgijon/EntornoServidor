<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería</title>
</head>

<body>
    <?php
    function dameTarjeta($perfil)
    {

        if ($perfil == "admin") {
            $tarjeta = [
                [11, 12, 13, 41, 51],
                [11, 12, 13, 41, 51],
                [11, 12, 13, 41, 51],
                [11, 12, 13, 41, 51],
                [11, 12, 13, 41, 51]
            ];
        } else {
            $tarjeta = [
                [11, 12, 13, 41, 51],
                [11, 12, 13, 41, 51],
                [11, 12, 13, 41, 51],
                [11, 12, 13, 41, 51],
                [11, 12, 13, 41, 51]
            ];
        }
        return $tarjeta;
    }

    function compruebaClave($tarjeta, $fila, $columna, $valor) {

        
    }

    function imprimeTarjeta($tarjeta)
    {
    ?>
        <table border="1px solid">
            <tr>
                <td></td>
                <td>A</td>
                <td>B</td>
                <td>C</td>
                <td>D</td>
                <td>E</td>
            </tr>
            <?php
              for ($i=0; $i < 5 ; $i++) { 
               echo "<tr>";
                    for ($j=0; $j < 5; $j++) { 
                        echo "<td>$tarjeta[$i][$j]</td>";
                    }
               echo "</tr>";
              }  
            ?>
        </table>
    <?php

    }
    ?>
</body>

</html>