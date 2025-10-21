<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4F</title>

    <style>
        table {
            float: left;
        }
    </style>
</head>

<body>
    <?php
    if (!isset($_GET['personas'])) {
        $personas = [
            ['nombre' => 'Anita', 'sexo' => 'm', 'orientacion' => 'bis'],
            ['nombre' => 'Lolita', 'sexo' => 'm', 'orientacion' => 'bis'],
            ['nombre' => 'Pepito', 'sexo' => 'h', 'orientacion' => 'bis'],
            ['nombre' => 'Juanito', 'sexo' => 'h', 'orientacion' => 'bis'],
            ['nombre' => 'Roberto', 'sexo' => 'h', 'orientacion' => 'het'],
            ['nombre' => 'Antonio', 'sexo' => 'h', 'orientacion' => 'het'],
            ['nombre' => 'Manuela', 'sexo' => 'm', 'orientacion' => 'het'],
            ['nombre' => 'Isabel', 'sexo' => 'm', 'orientacion' => 'het'],
            ['nombre' => 'Jenifer', 'sexo' => 'm', 'orientacion' => 'hom'],
            ['nombre' => 'Susan', 'sexo' => 'm', 'orientacion' => 'hom'],
            ['nombre' => 'Peter', 'sexo' => 'h', 'orientacion' => 'hom'],
            ['nombre' => 'Mike', 'sexo' => 'h', 'orientacion' => 'hom']
        ];
    } else {

        $personas = unserialize(base64_decode($_GET['personas']));
        $nombre = $_GET["nombre"];
        $sexo = $_GET["sexo"];
        $orientacion = $_GET["orientacion"];
        if ($orientacion == "homosexual") {
            $orientacion = "hom";
        }
        if ($orientacion == "heterosexual") {
            $orientacion = "het";
        }
        if ($orientacion == "bisexual") {
            $orientacion = "bis";
        }
        $personas[] = ["nombre" => $nombre, "sexo" => $sexo, "orientacion" => $orientacion];
    }

    $cadenaPersonas = base64_encode(serialize($personas));
    ?>
    <form action="" method="get">
        <label for="">Introduce el nombre</label>
        <input type="text" name="nombre">
        <br><br>
        <label for="">Introduce el sexo (h o m)</label>
        <input type="text" name="sexo">
        <br><br>
        <label for="">Introduce tu orientación</label>
        <input type="text" name="orientacion">
        <input type="hidden" name="personas" value="<?= $cadenaPersonas ?>">
        <input type="submit" value="Enviar">
    </form>
    <br>
    <form action="ejercicio4.1.php" method="get">
        <input type="hidden" name="personas" value="<?= $cadenaPersonas ?>">
        <input type="submit" value="Ver parejas">
    </form>
</body>

</html>