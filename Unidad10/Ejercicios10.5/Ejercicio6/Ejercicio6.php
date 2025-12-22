<?php
try {
    $conexion = new PDO("mysql:host=localhost;dbname=gestimal;charset=utf8", "root", "toor");
} catch (PDOException $e) {
    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
    die("Error: " . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        a {
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            width: 100%;
            height: 100%;

        }

        a:hover {
            text-decoration: underline;
            background-color: gray;
        }

        div {
            width: 100%;
            height: 100%;
        }

        td {
            height: 40px;
        }

        th {
            width: 180px;
            height: 40px;
        }
    </style>
</head>

<body>
    <h1>Horario Clase</h1>
    <table border="1">
        <thead>
            <th></th>
            <th>Primera</th>
            <th>Segunda</th>
            <th>Tercera</th>
            <th>Cuarta</th>
            <th>Quinta</th>
            <th>Sexta</th>
        </thead>
        <tbody>
            <?php
            $consulta = $conexion->query("SELECT * FROM horario ORDER BY FIELD(dia, 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes')");
            while ($horario = $consulta->fetchObject()) {
            ?>
                <tr>
                    <th><?= $horario->dia ?></th>
                    <td>
                        <div><a href="modificarHora.php?&hora=primera&dia=<?= $horario->dia ?>"><?= $horario->primera ?></a></div>
                    </td>
                    <td>
                        <div><a href="modificarHora.php?&hora=segunda&dia=<?= $horario->dia ?>"><?= $horario->segunda ?></a></div>
                    </td>
                    <td>
                        <div><a href="modificarHora.php?&hora=tercera&dia=<?= $horario->dia ?>"><?= $horario->tercera ?></a></div>
                    </td>
                    <td>
                        <div><a href="modificarHora.php?&hora=cuarta&dia=<?= $horario->dia ?>"><?= $horario->cuarta ?></a></div>
                    </td>
                    <td>
                        <div><a href="modificarHora.php?&hora=quinta&dia=<?= $horario->dia ?>"><?= $horario->quinta ?></a></div>
                    </td>
                    <td>
                        <div><a href="modificarHora.php?&hora=sexta&dia=<?= $horario->dia ?>"><?= $horario->sexta ?></a></div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>