<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <style>
        html {
            font-family: sans-serif;
        }

        .enlaces {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .enlace {
            text-decoration: none;
        }
        .enlace:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Listado de Asignaturas</h1>
    <hr>
    <table border="1px">
        <tr>
            <td>Código</td>
            <td>Asignatura</td>
        </tr>
        <?php
        foreach ($data['asignaturas'] as $asignatura) {
        ?>
            <tr>
                <td><?= $asignatura->getCodigo() ?></td>
                <td><?= $asignatura->getNombre() ?></td>
                 <td>
                    <form action="../../Controller/asignatura/verAlumnos.php" method="post">
                        <input type="hidden" name="codigo" value="<?= $asignatura->getCodigo() ?>">
                        <input type="submit" name="verAlumnos" value="Ver alumnnos">
                    </form>
                </td>
                <td>
                    <form action="../../Controller/asignatura/borrarAsignatura.php" method="post">
                        <input type="hidden" name="codigo" value="<?= $asignatura->getCodigo() ?>">
                        <input type="submit" name="eliminar" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="7">
                <div class="enlaces">
                    <a class="enlace" href="../../Controller/asignatura/nuevaAsignatura.php">Nueva Asignatura</a>
                    <a class="enlace" href="../../Controller/index.php">Volver</a>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>