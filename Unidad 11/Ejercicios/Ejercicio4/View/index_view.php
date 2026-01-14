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
            <td><?= $alumno->getContenido() ?></td>
        </tr>
            <a href="../Controller/borraArticulo.php?= $articulo->getId() ?>">Borrar</a>
        <?php
        }
        ?>
    </table>
    <a href="../Controller/nuevoAlumno.php">Añadir alumno</a>
</body>

</html>