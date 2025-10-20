<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú principal</title>
</head>

<body>

<?php
  if(!isset($_GET['curriculums'])) {
    $curriculums = [];
  } else {
    $curriculums = unserialize(base64_decode($_GET['curriculums']));



    
  }
  $cadenaCV = base64_encode(serialize($curriculums));
?>
    <h2>Formulario 1</h2>
    <form action="añadir_cv.php" method="get">
        <label for="dni">Introduce el dni:</label>
        <input type="text" name="dni" required>
        <input type="hidden" name="curriculums" value="<?=$cadenaCV ?>">
        <input type="submit" value="Nuevo CV">
    </form>

    <h2>Formulario 2</h2>
    <form action="listado_cv.php" method="get">
    <input type="submit" value="Listar cv">
    <input type="hidden" name="curriculums" value="<?=$cadenaCV ?> ">
    </form>
</body> 

</html>