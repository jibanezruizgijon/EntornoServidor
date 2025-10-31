<?php
session_start();


if (!isset($_SESSION['usuario'])) {
    header("Location: pagina_login.php");
} 


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4</title>
</head>

<body>
<h3>Has entrado a la pagina</h3>
</body>

</html>