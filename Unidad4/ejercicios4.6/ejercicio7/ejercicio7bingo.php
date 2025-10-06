<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>

<body>
    <h2>Selecciona 6 números</h2>

    <form action="ejercicio7.php" method="post">
        <table border="1px">
            <thead>
                <th colspan="10">Bingo</th>
            </thead>
            <?php
            $suma = 1;
            for ($i = 1; $i <= 5; $i++) {
            ?>
                <tr>
                    <?php
                    for ($j = 1; $j <= 10; $j++) {
                    ?>
                        <td><?= $suma ?><input type="checkbox" name="<?= $suma ?>"></td>
                    <?php
                        $suma++;
                    }
                    ?>
                </tr>
            <?php
            }
            ?>
        </table>
        <br>
        <label for="serie">Número de serie(1 al 999):</label>
        <input type="number" name="nSerie">
        <input type="submit" value="confirmar">
    </form>
</body>

</html>