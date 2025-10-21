<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Añadir curriculum</title>
</head>

<body>
  <?php
  $dni = $_GET['dni'];
  $curriculums = unserialize(base64_decode($_GET['curriculums']));

  if (isset($_GET['titulo'])) {
    $titulo = $_GET['titulo'];
    $valor = $_GET['valor'];
    if (!isset($curriculums[$dni])) {
      $curriculums[$dni] = [];
    }
    $curriculums[$dni][$titulo] = $valor;

    
  }

  $cadenaCV = base64_encode(serialize($curriculums));
  ?>

  <form action="" method="get">
    <label for="">Introduce el título</label>
    <input type="text" name="titulo">
    <label for="">Introduce el valor</label>
    <input type="text" name="valor">
    <input type="hidden" name="curriculums" value="<?= $cadenaCV ?>">
    <input type="hidden" name="dni" value="<?=$dni?>">
    <input type="submit" value="Añadir">
  </form>

  <form action="menu_principal.php" method="get">
    <input type="hidden" name="curriculums" value="<?= $cadenaCV ?>">
    <input type="submit" value="Finalizar">
  </form>
</body>

</html>