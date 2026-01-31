<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos Matriculados</title>
    
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
    <h1>Asignatura: <?= $data['asignatura']->getNombre() ?></h1>
    <table>
        <tr>
            <td>Matrícula</td>
            <td>Nombre</td>
        </tr>
        <?php
        foreach ($data['alumnos'] as $alumno) {
        ?>
            <tr>
                <td><?= $alumno->getMatricula() ?></td>
                <td><?= $alumno->getApellidos() ?>, <?= $alumno->getNombre() ?></td>
                <td>
                    <form action="../Controller/desmatricular.php" method="post">
                        <input type="hidden" name="asignaturas" value="asigntura">
                        <input type="hidden" name="codigo_asignatura" value="<?= $data['asignatura']->getCodigo() ?>">
                        <input type="hidden" name="matricula" value="<?= $alumno->getMatricula() ?>">
                        <input type="submit" name="desmatricular" value="Desmatricular">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="7">
                <div class="enlaces">
                    <a class="enlace" href="../Controller/asignatura/mostrarAsignaturas.php">Volver</a>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>