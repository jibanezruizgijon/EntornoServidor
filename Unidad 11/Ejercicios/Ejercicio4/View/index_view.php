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
    <h1>Listado de alumnos</h1>
    <hr>
    <table border="1px">
        <tr>
            <td></td>
            <td></td>
            <td>Matricula</td>
            <td>Apellidos</td>
            <td>Nombre</td>
            <td>Curso</td>
            <td></td>
        </tr>
        <?php
        foreach ($data['alumnos'] as $alumno) {
        ?>
            <tr>
                <td>
                    <form action="../Controller/alumno/borraAlumno.php" method="post">
                        <input type="hidden" name="matricula" value="<?= $alumno->getMatricula() ?>">
                        <input type="submit" name="eliminar" value="Eliminar">
                    </form>
                </td>
                <td>
                    <form action="../Controller/alumno/modificarAlumno.php" method="post">
                        <input type="hidden" name="matricula" value="<?= $alumno->getMatricula() ?>">
                        <input type="submit" name="modificar" value="Modificar">
                    </form>
                </td>
                <td><?= $alumno->getMatricula() ?></td>
                <td><?= $alumno->getApellidos() ?></td>
                <td><?= $alumno->getnombre() ?></td>
                <td><?= $alumno->getCurso() ?></td>
                <td>
                    <form action="../Controller/verAsignaturas.php" method="post">
                        <input type="hidden" name="matricula" value="<?= $alumno->getMatricula() ?>">
                        <input type="submit" name="asignaturas" value="Ver asignaturas">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="7">
                <div class="enlaces">
                    <a class="enlace" href="../Controller/alumno/nuevoAlumno.php">Nuevo Alumno</a>
                    <a class="enlace" href="../Controller/asignatura/mostrarAsignaturas.php">Asiganturas</a>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>