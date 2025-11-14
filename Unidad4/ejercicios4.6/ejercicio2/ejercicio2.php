<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $n1 = rand(1, 49);
    $n2 = rand(1, 49);
    $n3 = rand(1, 49);
    $n4 = rand(1, 49);
    $n5 = rand(1, 49);
    $n6 = rand(1, 49);
    $serieGanadora = rand(1, 999);
    $aciertos = 0;
    $dinero = 0;
    $nSerie = $_POST['nSerie'];
    ?>
    <h2>Número ganador</h2>
    <table border="1px">
        <tr>
            <td> <?= $n1 ?> </td>
            <td> <?= $n2 ?> </td>
            <td> <?= $n3 ?> </td>
            <td> <?= $n4 ?> </td>
            <td> <?= $n5 ?> </td>
            <td> <?= $n6 ?> </td>
            <td> <?= $serieGanadora ?> </td>
        </tr>
    </table>

    <?php
    if (isset($_REQUEST[$n1])) {
        $aciertos++;
    }
    if (isset($_REQUEST[$n2])) {
        $aciertos++;
    }
    if (isset($_REQUEST[$n3])) {
        $aciertos++;
    }
    if (isset($_REQUEST[$n4])) {
        $aciertos++;
    }
    if (isset($_REQUEST[$n5])) {
        $aciertos++;
    }
    if (isset($_REQUEST[$n6])) {
        $aciertos++;
    }
    ?>

    <h3>Has acertado <?= $aciertos ?> números </h3>
    <?php
    if ($serieGanadora === $nSerie ) {
        $dinero += 500;
    }
    switch ($aciertos) {
        case '4':
            echo "<h3>dinero devuelto</h3>";
            break;
        case '5':
            $dinero += 30;
            echo "<h3>Has ganado ", $dinero, " euros</h3>";
            break;
        case '6':
            $dinero += 100;
            echo "<h3>Has ganado ", $dinero, " euros</h3>";
            break;
        default:
            echo "<h3>Has ganado ", $dinero, " euros</h3>";
    }

    

    ?>
</body>

</html>