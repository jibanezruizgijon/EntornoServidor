<?php
  include_once "Menu.php";  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
 <h1>Menú</h1>

    <form action="" method="post">
        <label>Introduce el título:</label>
        <input type="text" name="titulo">
        <label>Introduce el enlace:</label>
        <input type="text" name="enlace">
        <input type="submit" value="añadir">
    </form>
    <?php
    if (isset($_POST['titulo'])) {
        $menu1 = new Menu($_POST['titulo'], $_POST['enlace']);
        echo $menu1->mostrarHorizontal();
        echo "<br>";
    }
    ?>
</body>
</html>