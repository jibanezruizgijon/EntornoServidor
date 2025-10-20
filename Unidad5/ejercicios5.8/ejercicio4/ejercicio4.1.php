<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parejas</title>
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>


<body>
    <?php
    $personas = unserialize(base64_decode($_GET['personas']));
    ?>
    <table border="1px solid">
        <?php
        $seleccionado = isset($_GET['seleccionado']) ? $_GET['seleccionado'] : "";


        foreach ($personas as $persona) {
            if ($seleccionado == $persona["nombre"]) {
        ?>
                <tr style="color: red;">
                <?php
            }

            foreach ($persona as $datos) {
                echo "<td>$datos</td>";
            }
                ?>
                <td><a href="?seleccionado=<?= $persona["nombre"] ?>&personas=<?= base64_encode(serialize($personas)) ?>">Seleccionar</a></td>
                <?php
                if ($seleccionado != "") {
                ?>
                    <table border="1px solid">
                        <?php
                          foreach ($personas as $persona2) {
                           if ($persona['orientacion'] == "bis" && $persona['nombre'] != $persona2['nombre']) {
                            echo "<tr>";

                            foreach ($persona2 as $datos) {
                               echo "<td>$datos</td>";
                            }
                            echo "</tr>";
                           }
                          }
                        ?>
                    </table>
            <?php
                }
                echo "</tr>";
            }
            ?>
    </table>
</body>

</html>