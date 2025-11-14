<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // Rellena los huecos que haya vacío de un array con números random
    function combinacion($array)
    {
        for ($i = 0; $i < 6; $i++) {
            if ($array[$i] == null) {
                $array[$i] = rand(1, 49);
            }
        }
        if ($array[count($array) - 1] == null) {
            $array[count($array) - 1] = rand(1, 999);
        }
        return $array;
    }

    // Crea una tabla mostrando en una fila el titulo introducido o por defecto 
    // En otra fila muestra cada número del array
    function imprimeApuesta($array, $texto = "Combinación generada para la Primitiva")
    {

    ?>
        <table border="2px solid">
            <tr>
                <td colspan="7" style="text-align: center;"><?= $texto ?></td>
            </tr>
            <tr>
                <?php
                // Me aparece mas veces la palabra serie
                // foreach ($array as $numero) {
                //     if ($numero == $array[6]) {
                //         echo "<td>nº serie:$numero</td> ";
                //     } else {
                //         echo "<td>$numero</td>";
                //     }
                // }

                for ($i = 0; $i < count($array) - 1; $i++) {
                    echo "<td>$array[$i] </td>";
                }
                ?>
                <td> Nº Serie:<?= $array[count($array) - 1] ?></td>
                <?php
                ?>
            </tr>
        </table>
    <?php
    }
    ?>
</body>

</html>