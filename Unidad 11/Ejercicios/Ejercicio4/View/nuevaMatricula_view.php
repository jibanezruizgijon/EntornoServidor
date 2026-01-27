<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
</head>

<body>
    <h1>Alumno: <?= $data['alumno']->getApellidos() ?>, <?= $data['alumno']->getNombre() ?> </h1>
    <h3>Matricular un nuevo módulo</h3>
    <table>
        <tr>
            <td>Código</td>
            <td>Asignatura</td>
        </tr>
        <?php
        foreach ($data['matriculas'] as $matricula) {
        ?>
            <tr>
                <td><?= $matricula->getCodigo() ?></td>
                <td><?= $matricula->getNombre() ?></td>
                <td>
                    <form action="../Controller/matricular.php" method="post">
                        <input type="hidden" name="matricula" value="<?= $data['alumno']->getMatricula() ?>">                        
                        <input type="hidden" name="codigo" value="<?= $matricula->getCodigo() ?>">
                        <input type="submit" value="matricular" name="Matricular">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
        <td>
            <a href="../Controller/verAsignaturas.php?matricula=<?= $data['alumno']->getMatricula() ?>">Volver</a>
        </td>
    </table>
</body>

</html>