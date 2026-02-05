<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>	
    <style>
        html {
            font-family: sans-serif;
        }

        table{
            margin: 10px auto;
        }

        h1{
            text-align: center;
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
    <table class="table table-striped table-hover">
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
                    <form action="../Controller/alumno/borraAlumno.php" class="btn btn-danger" method="post">
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
                        <input class="btn btn-primary" type="submit" name="asignaturas" value="Ver asignaturas">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="7">
                <div class="enlaces">
                    <a class="btn btn-primary" href="../Controller/alumno/nuevoAlumno.php">Nuevo Alumno</a>
                    <a  class="btn btn-primary" href="../Controller/asignatura/mostrarAsignaturas.php">Asiganturas</a>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>