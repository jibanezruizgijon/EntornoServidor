<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <style>
        .container {
            font-family: sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 1200px;
            margin: 100 auto;
        }
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .boton{
            padding: 10px;
            font-size: 1.4rem;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>Logística de transportes UTRETRANS</h1>
        <!--  Tabla de nuevoTransporte -->
        <table border="1px solid">
            <tr>
                <th>ORIGEN</th>
                <th>DESTINO</th>
                <th>EMPRESA</th>
                <th colspan="2">FECHA</th>
            </tr>
            <!-- Crear Transporte nuevo -->
            <tr>
                <form action="../Controller/nuevoTransporte.php" method="post">
                    <td><select name="origen">
                            <?php
                            foreach ($data['ciudades'] as $ciudad) {
                            ?>
                                <option value="<?= $ciudad->getId() ?>"> <?= $ciudad->getNombre() ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td><select name="destino">
                            <?php
                            foreach ($data['ciudades'] as $ciudad) {
                            ?>
                                <option value="<?= $ciudad->getId() ?>"> <?= $ciudad->getNombre() ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="text" name="empresa" required></td>
                    <td><input type="date" name="fecha" required></td>
                    <td><input type="submit" name="nuevoTransporte" value="Nuevo Transporte"></td>
                </form>
            </tr>
        </table>

        <!-- Mensaje en caso de cambiar fecha por otra ya existente -->
        <p style="color: red;"><?= $mensaje ?></p>
        <!-- Botón de busqueda -->
         <br>
        <form action="../Controller/busqueda.php" method="post">
            <input class="boton" type="submit" name="busqueda" value="BUSQUEDA Y FILTRADO DE TRANSPORTES">
        </form>

        <!-- Tabla con todos los transportes -->
        <h3>Histórico de transportes</h3>
        <table border="1px solid">
            <tr>
                <th>ORIGEN</th>
                <th>DESTINO</th>
                <th>EMPRESA</th>
                <th colspan="2">FECHA</th>
            </tr>
            <?php
            foreach ($data['transportes'] as $transporte) {
                if ( strtotime($transporte['fecha']) < strtotime("now")) {
                    $aviso = "style='background-color: lightcoral;'";
                } else {
                    $aviso = "";
                }
            ?>
                <form action="../Controller/cambiarFecha.php" method="post">
                    <input type="hidden" name="id" value="<?= $transporte['id'] ?>">
                    <input type="hidden" name="origen" value="<?= $transporte['idOrigen'] ?>">
                    <input type="hidden" name="destino" value="<?= $transporte['idDestino'] ?>">
                    <input type="hidden" name="empresa" value="<?= $transporte['empresa'] ?>">
                    <tr <?= $aviso ?>>
                        <td><?= $transporte['origen'] ?></td>
                        <td><?= $transporte['destino'] ?></td>
                        <td><?= $transporte['empresa'] ?></td>
                        <td><input type="date" name="fecha" value="<?= $transporte['fecha']  ?>"></td>
                        <td> <input type="submit" name="cambiarFecha" value="Cambiar Fecha"></td>
                    </tr>
                </form>
            <?php
            }
            ?>
        </table>

    </div>
</body>

</html>