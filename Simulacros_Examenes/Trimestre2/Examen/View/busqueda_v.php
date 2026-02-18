<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtro</title>
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

        <h1>Consulta de Transportes</h1>
        <!-- Tabla para filtrar -->
        <table border="1px solid">
            <tr>
                <th>ORIGEN</th>
                <th>DESTINO</th>
                <th>EMPRESA</th>
                <th colspan="2">FECHA</th>
            </tr>
            <tr>
                <form action="../Controller/busqueda.php" method="post">
                    <td><select name="origen">
                         <option value="">--Seleccionar--</option>
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
                        <option value="">--Seleccionar--</option>
                            <?php
                            foreach ($data['ciudades'] as $ciudad) {
                            ?>
                                <option value="<?= $ciudad->getId() ?>"> <?= $ciudad->getNombre() ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="text" name="empresa" ></td>
                    <td><input type="date" name="fecha" ></td>
                    <td><input type="submit" name="filtroTransporte" value="FILTRAR"></td>
                </form>
            </tr>
        </table>


        <h3>Transportes encontrados</h3>
        <!-- Tabla Resultados de búsqueda -->
        <table border="1px solid">
            <tr>
                <th>ORIGEN</th>
                <th>DESTINO</th>
                <th>EMPRESA</th>
                <th colspan="2">FECHA</th>
            </tr>
            <?php
            foreach ($data['transportes'] as $transporte) {
            ?>
                <tr>
                    <td><?= $transporte['origen'] ?></td>
                    <td><?= $transporte['destino'] ?></td>
                    <td><?= $transporte['empresa'] ?></td>
                    <td><?= $transporte['fecha']  ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <!-- Botón Página principal -->
         <br>
        <form action="../Controller/index.php" method="post">
            <input class="boton" type="submit" value="Página Principal">
        </form>
    </div>
</body>

</html>