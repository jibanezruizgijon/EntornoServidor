<?php
if (session_status() == PHP_SESSION_NONE) session_start();


if (isset($_COOKIE['encuesta']) && !isset($_SESSION['encuesta'])) {
    $_SESSION['encuesta'] = unserialize(base64_decode($_COOKIE['encuesta']));
}
if (!isset($_SESSION['encuesta'])) {
    $_SESSION['encuesta'] = [
        "si"=> 0,
        "no" => 0,
    ];
}

if (isset($_POST['si'])) {
    $_SESSION['encuesta']["si"]++;

    $encuesta = base64_encode(serialize($_SESSION['encuesta']));

    setcookie("encuesta", $encuesta, time() + 3 *30 * 24 * 60 * 60);
}

if (isset($_POST['no'])) {
    $_SESSION['encuesta']["no"]++;

    $encuesta = base64_encode(serialize($_SESSION['encuesta']));

    setcookie("encuesta", $encuesta, time() + 3 *30 * 24 * 60 * 60);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta</title>
    <style>
        body {
            padding-left: 30px;
        }
        .si{
            color: green;
        }
        .no{
            color:red;
        }
        strong{
            color: black;
        }
    </style>
</head>

<body>
    <h1>¿Crees que la IA remplazará a la mayoría de los programadores juniors?</h1>

    <p class="si"><strong>SI</strong>
        <?php
        for ($i = 0; $i < $_SESSION['encuesta']["si"]; $i++) {
            echo "X ";
        }
        ?>
    </p>
    <p class="no"><strong>SI</strong>
        <?php
        for ($i = 0; $i < $_SESSION['encuesta']["no"]; $i++) {
            echo "X ";
        }
        ?>
    </p>
    <form action="" method="post">
        <input type="submit" name="si" value="SI">
    </form>

    <br>
    <form action="" method="post">
        <input type="submit" name="no" value="NO">
    </form>


</body>

</html>