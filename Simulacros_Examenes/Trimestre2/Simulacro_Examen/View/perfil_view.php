<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <style>
        img{
            width: 400px;
        }
    </style>
</head>

<body>

    <h1>Perfil de usuario <?= $_SESSION['nombre'] ?></h1>

    <form action="../Controller/index.php" method="post">
        <input type="submit" name="cerrar" value="Cerrar Sesión">
    </form>
<br>
    <form action="../Controller/index2.php" method="post">
        <input type="submit" name="pagina" value="Pagina Principal">
    </form>
    <hr>
    <form action="../Controller/publicar.php" enctype="multipart/form-data" method="post">
        <label for="imagen"> Subir una Imagen:</label><br><br>
        <input type="file" id="imagen" name="imagen"> 
        <input type="submit" name="aceptar" value="Aceptar">
        </fieldset>
    </form>

    <hr>

    <?php
      foreach ($data['fotos'] as $foto) {
        ?>
         <img src="../View/imagen/<?= $foto['imagen'] ?>" alt="imagen"> 
         <br>
        <?php
      }  
    ?>
</body>

</html>