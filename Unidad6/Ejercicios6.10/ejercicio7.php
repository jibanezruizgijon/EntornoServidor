<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_GET['nacimiento']) && isset($_GET['futuro'])){
            $nacimiento = $_GET['nacimiento'];
            $futuro = $_GET['futuro'];
            $segundosNac = strtotime($nacimiento);
            $segundosFut = strtotime($futuro);

            $edadFutura = $segundosFut - $segundosNac;
            echo $edadFutura/60/60/24/365.25 ;
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