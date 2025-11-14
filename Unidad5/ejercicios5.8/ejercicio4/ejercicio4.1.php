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

        table {
            float: left;
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
            echo "</tr>";
        }
            ?>
    </table>

    <?php
    if (isset($_GET['seleccionado'])) {
    ?>
        <table border="1px solid">
            <tr>
                <th colspan="4">Personas compatibles con <?= $seleccionado ?></th>
            </tr>
            <?php
            // Buscar persona seleccionada
            foreach ($personas as $personaS) {
                if ($personaS['nombre'] == $seleccionado) {

                    // Comparar con las demás personas
                    foreach ($personas as $pareja) {
                        if ($pareja['nombre'] == $seleccionado) {
                        } else {



                            // Si el seleccionado es hombre
                            if ($personaS['sexo'] == "h") {

                                // En caso de ser heterosexual
                                if ($personaS['orientacion'] == 'het') {
                                    if ($pareja['sexo'] == "m" && ($pareja['orientacion'] == "het" || $pareja['orientacion'] == "bis")) {
            ?>
                                        <tr>
                                            <td><?= $pareja['nombre'] ?></td>
                                            <td><?= $pareja['sexo'] ?></td>
                                            <td><?= $pareja['orientacion'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                }

                                // En caso de ser homosexual
                                if ($personaS['orientacion'] == "hom") {
                                    if ($pareja['sexo'] == "h" && ($pareja['orientacion'] == "hom" || $pareja['orientacion'] == "bis")) {
                                    ?>
                                        <tr>
                                            <td><?= $pareja['nombre'] ?></td>
                                            <td><?= $pareja['sexo'] ?></td>
                                            <td><?= $pareja['orientacion'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                }

                                // En caso de ser bisexual
                                if ($personaS['orientacion'] == 'bis') {
                                    if (
                                        ($pareja['sexo'] == "h" && ($pareja['orientacion'] == "hom" || $pareja['orientacion'] == "bis")) ||
                                        ($pareja['sexo'] == "m" && ($pareja['orientacion'] == "het" || $pareja['orientacion'] == "bis"))
                                    ) {
                                    ?>
                                        <tr>
                                            <td><?= $pareja['nombre'] ?></td>
                                            <td><?= $pareja['sexo'] ?></td>
                                            <td><?= $pareja['orientacion'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                }
                            }

                            // Si la seleccionada es mujer
                            if ($personaS['sexo'] == "m") {

                                // En caso de ser heterosexual
                                if ($personaS['orientacion'] == "het") {
                                    if ($pareja['sexo'] == "h" && ($pareja['orientacion'] == "het" || $pareja['orientacion'] == "bis")) {
                                    ?>
                                        <tr>
                                            <td><?= $pareja['nombre'] ?></td>
                                            <td><?= $pareja['sexo'] ?></td>
                                            <td><?= $pareja['orientacion'] ?></td>
                                        </tr>
                                    <?php

                                    }
                                }

                                // En caso de ser homosexual
                                if ($personaS['orientacion'] == 'hom') {
                                    if ($pareja['sexo'] == "m" && ($pareja['orientacion'] == "hom" || $pareja['orientacion'] == "bis")) {
                                    ?>
                                        <tr>
                                            <td><?= $pareja['nombre'] ?></td>
                                            <td><?= $pareja['sexo'] ?></td>
                                            <td><?= $pareja['orientacion'] ?></td>
                                        </tr>
                                    <?php
                                    }
                                }

                                // En caso de ser bisexual
                                if ($personaS['orientacion'] == "bis") {
                                    if (
                                        ($pareja['sexo'] == "m" && ($pareja['orientacion'] == "hom" || $pareja['orientacion'] == "bis")) ||
                                        ($pareja['sexo'] == "h" && ($pareja['orientacion'] == "het" || $pareja['orientacion'] == "bis"))
                                    ) {
                                    ?>
                                        <tr>
                                            <td><?= $pareja['nombre'] ?></td>
                                            <td><?= $pareja['sexo'] ?></td>
                                            <td><?= $pareja['orientacion'] ?></td>
                                        </tr>
            <?php
                                    }
                                }
                            }
                        }
                    }
                }
            }
            ?>

        </table>
    <?php
    }
    ?>

</body>

</html>