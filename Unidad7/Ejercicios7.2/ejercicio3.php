<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>
</head>

<body>
    <?php
    if (isset($_REQUEST['num'])) {
        $_SESSION['num'] = $_POST['num'];
        // Inicia cunado se abre la página la primera vez
        $_SESSION['suma'] = isset($_SESSION['suma']) ?  $_SESSION['suma'] : 0;
        
    }
    ?>
    <form action="" method="post">
        <label>Introduce un número:</label>
        <input type="number" name="num">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>