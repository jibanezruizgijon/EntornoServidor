<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Blog</title>
</head>

<body>
    <h1>Listado de alumnos</h1>
    <hr>
    <table>
        <?php
        foreach ($data['alumnos'] as $alumno) {
        ?>
        <tr>
            <td><?= $alumno->getMatricula() ?></td>
            <td><?= $alumno->getnombre() ?></td>
            <td><?= $alumno->getApellidos() ?></td>
            <td><?= $alumno->getCurso() ?></td>
        </tr>
            <a href="../Controller/borraAlumno.php?matricula=<?=$alumno->getMatricula()?>">Borrar</a>
        <?php
        }
        ?>
    </table>
    <a href="../Controller/nuevoAlumno.php">Añadir alumno</a>
</body>

</html>