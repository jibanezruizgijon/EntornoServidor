<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Acceso</title>
</head>

<body>

  <h1>Control de acceso a una web</h1>
        <?php
        include_once("controlAcceso.php");
        $tarjetaAdmin = dameTarjeta("admin");
        $tarjetaEstandar = dameTarjeta("estandar");

        imprimeTarjeta($tarjetaAdmin);
        imprimeTarjeta($tarjetaEstandar);
          $filas = [1,2,3,4,5];
          $columnas = ["A", "B", "C", "D", "E"];
          $fila = array_rand($filas);
          $indice = array_rand($columnas);
          $columna = $columnas[rand(0, 4)];
        ?>
    <form action="" method="get">
    <label>¿Cuál es tu perfil?</label>
    Estándar<input type="radio" name="opcion" value="estandar">
    Administrador<input type="radio" name="opcion" value="admin">
    <br><br>
    <label> Introduce la clave de la fila <?=$fila?> y la columna <?=$columna?>:</label>
    <input type="number" name="clave">
    <input type="submit" value="Confirmar">
    </form>
</body>

</html>