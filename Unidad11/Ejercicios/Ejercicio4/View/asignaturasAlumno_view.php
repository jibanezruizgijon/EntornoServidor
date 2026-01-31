<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
</head>

<body>
    <h1>Alumno: <?= $data['alumno']->getApellidos() ?>, <?= $data['alumno']->getNombre() ?> </h1>
    <table border="1px solid">
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
                <td >
                    <form action="../Controller/desmatricular.php" method="post">
                        <input type="hidden" name="matricula" value="<?= $data['alumno']->getMatricula() ?>">
                        <input type="hidden" name="codigo_asignatura" value="<?= $matricula->getCodigo() ?>">
                        <input type="submit" value="Desmatricular" name="desmatricular">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
        <td colspan="3">
            <a href="../Controller/nuevaMatricula.php?matricula=<?= $data['alumno']->getMatricula() ?>">Matrícula nueva</a>
            <a class="btn btn-primary" href="../Controller/index.php">Volver</a>
        </td>
    </table>
</body>

</html>