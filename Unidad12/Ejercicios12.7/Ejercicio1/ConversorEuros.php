   <?php
    $respuesta = "";
    $error_msg = "";
    if (isset($_POST['cantidad'])) {
      $url = "http://localhost/EntornoServidor/Unidad12/Ejercicios12.7/Ejercicio1/servidor.php";

      $parametros = http_build_query([
        'cantidad' => $_POST['cantidad'],
        'tipo' => $_POST['tipo']
      ]);

      $json_recibido = @file_get_contents($url . "?" . $parametros);

      if ($json_recibido === false) {
        $error_msg = "Error: No se pudo conectar con el servicio web. Revisa la URL.";
        // Si hay cabeceras de respuesta, intentamos ver el código de error
        if (isset($http_response_header)) {
          $error_msg .= " Estado: " . $http_response_header[0];
        }
      } else {
        $respuesta = json_decode($json_recibido);
        if ($respuesta === null) {
          $error_msg = "Error: La respuesta del servidor no es un JSON válido. Recibido: " . htmlspecialchars($json_recibido);
        }
      }
    }
    ?>
   <!DOCTYPE html>
   <html lang="en">

   <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
   </head>

   <body>


     <h1>Conversos entre euros y pesetas</h1>

     <form action="" method="post">
       <label>Seleciona tipo de moneda</label>
       <select name="tipo" required>
         <option value="euros">euros</option>
         <option value="pesetas">pesetas</option>
       </select>
       <br><br>
       <label>Introduce una cantidad:</label>
       <input type="number" step="any" name="cantidad" min="0" required>
       <br><br>
       <input type="submit" value="Enviar">
     </form>

     <?php
      if ($error_msg != "") {
        echo "<p style='color:red;'>$error_msg</p>";
      }

      // Comprobamos explícitamente si no es null y no está vacío
      if ($respuesta !== null && $respuesta != "") {
        echo "<h3>Resultado: $respuesta</h3>";
      }
      ?>
   </body>

   </html>