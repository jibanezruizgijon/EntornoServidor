<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Próximo día de la semana</title>
</head>
<body>
    <?php
    if (isset($_GET['opcion'])) {
        $diaSeleccionado = $_GET['opcion']; // Ejemplo: "Monday"
        $hoy = time(); // Timestamp actual
        $proximoDia = strtotime("next " . $diaSeleccionado, $hoy); // Calcula el próximo día
        
        echo "El próximo " . $diaSeleccionado . " será: " . date("d-m-Y", $proximoDia);
    }
    ?>

    <form action="" method="get">
        <select name="opcion">
            <option value="Monday">Lunes</option>
            <option value="Tuesday">Martes</option>
            <option value="Wednesday">Miércoles</option>
            <option value="Thursday">Jueves</option>
            <option value="Friday">Viernes</option>
            <option value="Saturday">Sábado</option>
            <option value="Sunday">Domingo</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>