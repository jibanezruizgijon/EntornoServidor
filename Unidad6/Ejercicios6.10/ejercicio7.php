<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['nacimiento']) && isset($_GET['futuro'])) {
        $nacimiento = $_GET['nacimiento'];
        $futuro = $_GET['futuro'];
        $segundosNac = strtotime($nacimiento);
        $segundosFut = strtotime($futuro);

        if ($segundosFut < $segundosNac) {
            echo "<h2>La fecha futura es menor que la de nacimiento</h2>";
        } else {
            $edadFut = ($segundosFut - $segundosNac) / (60 * 60 * 24 * 365.25);
            echo "<h2>En la fecha $futuro tendrás " . floor($edadFut) . " años</h2>";
        }
    }
    ?>

    <form action="" method="get">
        <label>Introduce tu fecha de nacimiento</label>
        <input type="date" name="nacimiento">
        <br><br>
        <label>Introduce una fecha futura</label>
        <input type="date" name="futuro">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>