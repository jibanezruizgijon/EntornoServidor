<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Hola que tal estas
    <?php
        echo $_GET['nombre'];
    ?>
    <br>
    Tu apellido es <?=$_GET['apellido'] ?>;
</body>
</html>