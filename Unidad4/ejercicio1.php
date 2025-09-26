<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $dia_POST = ['dia'];
    switch ($dia) {
        case "lunes":
            echo "A primera hora toca Inglés";
            break;
        case "martes":
            echo "A primera hora toca Optativa";
            break;
        case "miércoles":
            echo "A primera hora toca DWES";
            break;
        case "jueves":
            echo "A primera hora toca DAW";
            break;
        case "viernes":
            echo "A primera hora toca DWEC";
            break;
        default:
            echo "Día incorrecto";
    }
    ?>

</body>

</html>