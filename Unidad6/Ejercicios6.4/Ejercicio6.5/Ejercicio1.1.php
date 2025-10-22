<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primitiva</title>
</head>

<body>
    <?php
    $numeros = isset($_GET['numeros']) ? $_GET['numeros'] : "";
    $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : "";

    if ($titulo != "") {
        echo "<h2>$titulo</h2>";
    }
    
    // Comprueba que numeros estan introducidos y en los que no los genera 
    for ($i = 0; $i <= 6; $i++) {
        if ($numeros[$i] == null) {
            if ($i == 6) {
                $numeros[$i] = rand(1,1000) ;
            } else{
                $numeros[$i] = rand(1,50) ;
            }
            
        }
    }
    print_r($numeros);
    ?>
</body>

</html>