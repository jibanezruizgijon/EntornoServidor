<?php
include_once "Receta.php";
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_POST['ingrediente'])) {
    $ingrediente = $_POST['ingrediente'];
} else {
    header("Location: index.php");
    exit();
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
    <!-- TABLA PARA MOSTRAR RECETAS -->
    <h1>Recetas que conengas el ingrediente <?= $ingrediente ?></h1>
    <table border="1">
        <thead>
            <tr>
                <th>CÓDIGO</th>
                <th>NOMBRE</th>
                <th>TIPO</th>
                <th>INGREDIENTES</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Muestra en la tabla solo las recetas que incluyan el ingrediente seleccionado
            if (isset($_SESSION['recetas'])) {
                foreach ($_SESSION['recetas'] as $recetas => $receta) {
                    $recetaMostrar = unserialize(base64_decode($receta));
                    if (mb_stripos($recetaMostrar->getMostrarIngredientes(), $ingrediente) != false) {
                        echo "<tr>";
                        echo "<td>" . $recetaMostrar->getCodigo() . "</td>";
                        echo "<td>" . $recetaMostrar->getNombre() . "</td>";
                        echo "<td>" . $recetaMostrar->getTipo() . "</td>";
                        echo "<td>" . $recetaMostrar->getMostrarIngredientes() . "</td>";
                        echo "</tr>";
                    }
                }
            }
            ?>
        </tbody>
    </table>
<br>
    <form action="index.php">
        <input type="submit" value="VOLVER">
    </form>
</body>

</html>