<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
     <?php
       $color = $_POST['color'];
       $letra = $_POST['letra'];
       $banner = $_POST['banner'];
       $texto = $_POST['texto'];
    ?>
       <style>
        body {
            background-color: <?= $color ?>;
            font-family: <?= $letra ?>;
            text-align: <?= $texto ?> ;
            margin: 0;
            padding: 0;
        }
      
    </style>
</head>
<body>
    <h1>Página personalizada</h1>
   
    <img src="img/<?= $banner ?>.jpg" alt="<?= $banner ?>">
</body>
</html>