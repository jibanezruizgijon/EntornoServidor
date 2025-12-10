<?php
include_once "Proyecto.php";

if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_COOKIE['tiempo'])) {
    setcookie("tiempo", time(), time()+ 7*24*60*60);
    $fecha = "Primera conexión";
} else {
    $tiempo = $_COOKIE['tiempo'];
    $fecha = time() - $tiempo;
    $fecha2 = date("d ", $fecha);
}

if (!isset($_SESSION['proyectos'])) {
    $_SESSION['proyectos'] = [];
}

if (isset($_POST['descripcion'])) {
    // 1. Recogemos los datos básicos
    $descripcion = $_POST['descripcion'];
    $urgencia = $_POST['urg']; // El radio button se llama 'urg'
    
    // 2. Metemos todos los desarrolladores en un array
    $lista_devs = [];
    if (!empty($_POST['desarrollador1'])) $lista_devs[] = $_POST['desarrollador1'];
    if (!empty($_POST['desarrollador2'])) $lista_devs[] = $_POST['desarrollador2'];
    if (!empty($_POST['desarrollador3'])) $lista_devs[] = $_POST['desarrollador3'];
    if (!empty($_POST['desarrollador4'])) $lista_devs[] = $_POST['desarrollador4'];
    if (!empty($_POST['desarrollador5'])) $lista_devs[] = $_POST['desarrollador5'];

    // 3. Instanciamos la clase
    // Fíjate que pasamos el array $lista_devs como tercer argumento
    $nuevo_proyecto = new Proyecto($descripcion, $urgencia, $lista_devs);
    $_SESSION['proyectos'][] = base64_encode(serialize( $nuevo_proyecto));
    // 4. Guardamos en el archivo (gracias al __toString es muy fácil)
    $fp = fopen("proyectos.txt", "a"); // "a" para añadir al final
    fwrite($fp, $nuevo_proyecto . PHP_EOL); // PHP_EOL es el salto de línea
    fclose($fp);
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

    <h1>Te conectaste por primera vez hace <?= $fecha2 ?></h1>
    <hr>
    <h1>Resumen de urgencias de los proyectos Baja: , Media: ,Alta: , Crítica: </h1>
    <hr>
    <h1>Nuevo proyecto</h1>
    <form action="" method="post">
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" required>
        <br><br>
        <label for="urgencia">Urgencia:</label>
        <input type="radio" value="Baja" name="urg" checked>Baja
        <input type="radio" value="Media" name="urg">Media
        <input type="radio" value="Alta" name="urg">Alta
        <input type="radio" value="Crítica" name="urg">Crítica
        <br><br>
        <label for="desarrollador1">Desarrollador 1:</label>
        <input type="text" name="desarrollador1" required>
        <br><br>
        <label for="desarrollador2">Desarrollador 2:</label>
        <input type="text" name="desarrollador2">
        <br><br>
        <label for="desarrollador3">Desarrollador 3:</label>
        <input type="text" name="desarrollador3">
        <br><br>
        <label for="desarrollador4">Desarrollador 4:</label>
        <input type="text" name="desarrollador4">
        <br><br>
        <label for="desarrollador5">Desarrollador 5:</label>
        <input type="text" name="desarrollador5">
        <br><br>
        <input type="submit" value="CREAR PROYECTO">
    </form>

    <hr>
    <form action="consultas.php" method="post">
        <label for="">Buscar texto en los proyectos:</label>
        <input type="text" name="buscar" required>
        <input type="submit" value="Buscar">
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>CODIGO</th>
                <th>DESCRIPCIÓN</th>
                <th>PRIORIDAD</th>
                <th>DESARROLLADORES</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $fp = fopen("proyectos.txt", "r");

            while (!feof($fp)) {
                $linea = fgets($fp);
                if ($linea != "") {
                    $array = explode(",", $linea);
                    echo "<tr>";
                    echo "<td>" . $array[0] . "</td>";
                    echo "<td>" . $array[1] . "</td>";
            ?>
                    <td>
                        <form action="" method="post">
                            <select name="prioridad">
                                <option value="Baja">Baja</option>
                                <option value="Media">Media</option>
                                <option value="Alta">Alta</option>
                                <option value="Crítica">Crítica</option>
                            </select>
                            <input type="submit" value="Cambiar">
                        </form>
                    </td>
            <?php
                    echo "<td>";
                    for ($i = 3; $i < count($array); $i++) {
                        echo $array[$i] . "<br>"    ;
                    }
                    echo "</td>";
                    "</tr>";
                }
            }

            fclose($fp);
            ?>
        </tbody>
    </table>
</body>

</html>