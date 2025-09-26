<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotería primitiva</title>
</head>

<body>
    <?php
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];
    $d = $_POST['d'];
    $e = $_POST['e'];
    $f = $_POST['f'];
    $s = $_POST['s'];
    $r1 = rand(1,49);
    $r2 = rand(1,49);
    $r3 = rand(1,49);
    $r4 = rand(1,49);
    $r5 = rand(1,49);
    $r6 = rand(1,49);
    $rs = rand(1,999);
   
    
     echo "<h2>Resultados</h2>";
        echo "<table border='1'>",
        "<tr>
        <th></th>
        <th>Usuario</th>
        <th>Ganador</th>
        </tr>
        <tr>
        <th>Combinación</th>
        <td>", $a,"-", $b,"-", $c,"-", $d,"-", $e,"-", $f, "</td>",
        "<td>", $r1,"-", $r2,"-", $r3,"-", $r4,"-", $r5,"-", $r6, "</td>",
        "</tr>",
        "<tr>
        <th>número de serie</th>
        <td>", $s, "</td>",
        "<td>", $rs, "</td>",
        "</tr>",
        "</table>"

    ?>
</body>

</html>