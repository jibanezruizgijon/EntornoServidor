<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Pedidos</title>
</head>

<body>

<?php
  $cadenaComidas = $_GET['cadenaComidas'];  

  $comidas = unserialize($cadenaComidas);
?>
    <table>
    <?php
      foreach ($comidas as $comida => $ingredientes ) { 
        echo "<tr>$comida <td>";
        foreach($comida as $ingredientes => $ingrediente){
            echo $ingrediente;
        }
        echo "</td></tr>";
      }  
    ?>
    </table>
</body>

</html>