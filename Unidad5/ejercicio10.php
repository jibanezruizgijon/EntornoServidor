<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio10</title>
</head>

<body>
  <?php
    $baraja = [
      "as de oro" => 11, "dos de oro" => 0, "tres de oro" => 10, "cuatro de oro" => 0, "cinco de oro" => 0, "seis de oro" => 0, "siete de oro" => 0, "sota de oro" => 2, "caballo de oro " => 3, "rey de oro" => 4,
      "as de copas" => 11, "dos de copas" => 0, "tres de copas" => 10, "cuatro de copas" => 0, "cinco de copas" => 0, "seis de copas" => 0, "siete de copas" => 0, "sota de copas" => 2, "caballo de copas" => 3, "rey de copas" => 4,
      "as de basto" => 11, "dos de basto" => 0, "tres de basto" => 10, "cuatro de basto" => 0, "cinco de basto" => 0, "seis de basto" => 0, "siete de basto" => 0, "sota de basto" => 2, "caballo de basto" => 3, "rey de basto" => 4,
      "as de espadas" => 11, "dos de espadas" => 0, "tres de espadas" => 10, "cuatro de espadas" => 0, "cinco de espadas" => 0, "seis de espadas" => 0, "siete de espadas" => 0, "sota de espadas" => 2, "caballo de espadas" => 3, "rey de espadas" => 4
    ];
    $elegidas = [];
    $puntos = 0;
    $nombreCartas = [];
    // Para recoger el nombre de las cartas
    foreach ($baraja as $nombre => $valor) {
      $nombreCartas[] = $nombre;
    }

    // Bucle para guardar 10 cartas que no se repitan 
    // Dentro también se calculan los puntos
    for ($i = 0; $i < 10; $i++) {

      do {
      // Genera un numero aleatorio y mete el nombre de la carta 
      $carta = $nombreCartas[rand(0, count($nombreCartas)-1)];
      }while(in_array($carta,$elegidas));

      // Se mete la carta en el array y se suman los puntos
      $elegidas[] = $carta;
      $puntos += $baraja[$carta];
    }
    ?>

    <h2>Cartas elegidas:</h2>

    <?php
    //Muestra las cartas
      foreach ($elegidas as $carta) {
       echo "<h3> $carta -  {$baraja[$carta]} puntos</h3>";
      }  
    ?>
      <h3>Total de puntos: <?= $puntos?> </h3>
    </body>

</html>