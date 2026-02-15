<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        img{
            width: 200px;
        }

        .registro{
            text-align: center;
            font-size: 2rem;
            padding: 17px;
        }
    </style>
</head>
<body>
    
<table border="1px solid black">
    <tr>
        <td colspan="3" class="registro"><a href="../Controller/login.php">Inicio Sesión/Registro</a></td>
    </tr>
    <tr>
        <th>Imagen</th>
        <th>Autor</th>
        <th>Likes</th>
    </tr>
    <?php
    
      foreach ($data['fotos'] as $foto) {
        ?>
         <tr>
            <td><img src="../View/imagen/<?= $foto['imagen']  ?>" alt="IMAGEN"></td>
            <td><?=$foto['nombre'] ?></td>
            <td><?= $foto['likes'] ?></td>
         </tr> 
        <?php
      }  
       
    ?> 
</table>
</body>
</html>