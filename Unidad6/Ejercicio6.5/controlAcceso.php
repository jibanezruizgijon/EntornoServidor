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

                [23, 12, 13, 14, 15],
                [21, 6, 23, 40, 15],
                [30, 2, 33, 7, 35],
                [41, 4, 33, 24, 45],
                [5, 29, 18, 4, 36]
            ];
        } else {
            $tarjeta = [
                [9, 26, 43, 7, 11],
                [40, 7, 17, 8, 10],
                [21, 14, 2, 14, 44],
                [6, 11, 18, 21, 7],
                [30, 1, 22, 37, 45]
            ];
        }
        return $tarjeta;
    }

    function compruebaClave($tarjeta, $fila, $columna, $valor)
    {
        if ($tarjeta[$fila][$columna] == $valor) {
            return true;
        } else {
            return false;
        }
    }

    function imprimeTarjeta($tarjeta)
    {
        $columnas = ['A', 'B', 'C', 'D', 'E'];

        echo "<table border='1'>";
        // Cabecera con letras A-E
        echo "<tr><th></th>";
        foreach ($columnas as $col) {
            echo "<th>$col</th>";
        }
        echo "</tr>";

        // Filas con números 1-5 y valores de la matriz
        for ($i = 0; $i < count($tarjeta); $i++) {
            echo "<tr><th>" . ($i + 1) . "</th>";
            for ($j = 0; $j < count($tarjeta[$i]); $j++) {
                echo "<td>" . $tarjeta[$i][$j] . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    }

    ?>
</body>

</html>