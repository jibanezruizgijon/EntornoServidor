<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $diametro = $_POST['diametro'];
    $altura = $_POST['altura'];
    $caudal = $_POST['caudal'];
    $radio = $diametro / 2;
    $volumen = pi() * $radio * $radio * $altura;
    $volumen_litros = $volumen * 1000;
    $tiempo = $volumen_litros / $caudal;
    $horas = floor($tiempo / 60);
    $minutos = round($tiempo % 60);
    ?>
    <h2> Resultado del tiempo de llenado</h2>
    <p>el tiempo de llenado será de <?= $horas ?> horas y <?= $minutos ?> minutos.</p>
</body>


</html>