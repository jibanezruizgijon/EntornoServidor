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
    
     echo "<h2>Resultados</h2>";
        echo "<table border='1'>";
        echo "<tr>
        <th>Combinación Usuario</th>
        <td>", $a,"-", $b,"-", $c,"-", $d,"-", $e,"-", $f, "</td>",
        "</tr>",
        "<tr>
        <th>número de serie</th>
        <td>", $s, "</td>",
        "</tr>"

    ?>
</body>

</html>