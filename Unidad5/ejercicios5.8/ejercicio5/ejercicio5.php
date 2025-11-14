<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio5</title>
</head>

<body>

    <?php
    // Si no se ha recogido el dato nombre crea el array con los datos de una persona
    if (!isset($_POST['nombre'])) {
        $personas  = [
            "Juan" =>  ["edad" => 22, "experiencia" => 1, "correo" => "juan@gmail.com"]
        ];
    } else {
        //Recuperar los datos de cada persona
        $personas = unserialize(base64_decode($_POST['arrayPersonas']));
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $experiencia = $_POST['experiencia'];
        $correo = $_POST['correo'];
        // Añade los datos en el array
        $personas[$nombre] = ["edad" => $edad, "experiencia" => $experiencia, "correo" => $correo];
    }

    ?>

    <h2>Introduce los datos del trabajador</h2>
    <hr>
    <!-- Formulario para introducir los datos del cv de una persona  -->
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
    <br>
    <!-- Formulario con un botón para mostrar todas las personas -->
    <form action="mostrar_listado.php" method="post">
        <input type="hidden" name="arrayPersonas" value="<?= base64_encode(serialize($personas)) ?>">
        <input type="submit" value="Finalizar lista">
    </form>
    <hr>


</body>

</html>