<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $a = $_POST['a'];
    $d = $_POST['d'];
    $r = $d/2;
    $p = pi();
    echo "<h1>", "Cálculo del volúmen de un cilindro", "</h1>";
    echo "El volumen del cilindro es de : ", $a * $r* $r * $p ,
    "<img src=\"img/cilindro.png\" alt=\"cilindro\" >" ;
    ?>
</body>

</html>