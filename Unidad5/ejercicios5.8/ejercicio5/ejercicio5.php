<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio5</title>
</head>

<body>

    <?php
    if (!isset($_POST['nombre'])) {
        $personas  = [
            "Juan" =>  ["edad" => 22, "experiencia" => 10, "correo" => "juanutrera@gmail.com"]
        ];
    } else {
        //Recuperar los datos de cada persona
        $personas = unserialize(base64_decode($_POST['arrayPersonas']));
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $experiencia = $_POST['experiencia'];
        $correo = $_POST['correo'];

        $personas [$nombre] = ["edad" => $edad,"experiencia" => $experiencia,"correo" => $correo];
        print_r($personas);
    }

    ?>

    <h2>Introduce los datos del trabajador</h2>
    <hr>
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br><br>
        <label for="edad">Edad:</label>
        <input type="number" name="edad" required>
        <br><br>
        <label for="experiencia">Años de experiencia:</label>
        <input type="number" name="experiencia" required>
        <br><br>
        <label for="correo">Correo</label>
        <input type="email" name="correo" required>
        <br><br>
        <input type="submit" value="Enviar">
        <input type="hidden" name="arrayPersonas" value="<?= base64_encode(serialize($personas)) ?>">
    </form>

    <form action="mostrar_listado.php" method="post">
        <input type="hidden" name="arrayPersonas" value="<?= base64_encode(serialize($personas)) ?>">
        <input type="submit" value="Finalizar lista">
    </form>
    <hr>


</body>

</html>