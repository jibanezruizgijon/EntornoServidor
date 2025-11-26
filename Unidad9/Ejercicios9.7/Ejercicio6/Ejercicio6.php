<?php
include_once "Vehiculo.php";
include_once "Coche.php";
include_once "Bicicleta.php";

if (session_status() == PHP_SESSION_NONE) session_start();


if (!isset($_SESSION['vehiculos'])) {
    $_SESSION['vehiculos'] = [];
    $_SESSION['kilometrajeTotal'] = 0;
}


$vehiculosTotales = [];
foreach ($_SESSION['vehiculos'] as $index => $serializado) {
    $vehiculosTotales[$index] = unserialize(base64_decode($serializado));
}

$resultado_accion = "";

if (isset($_POST['marcaBici'])) {
    $nuevaBici = new Bicicleta($_POST['marcaBici'], $_POST['tipo']);

    
    $_SESSION['vehiculos'][] = base64_encode(serialize($nuevaBici));

    $vehiculosTotales[] = $nuevaBici;
}

if (isset($_POST['marcaCoche'])) {
    $nuevoCoche = new Coche($_POST['marcaCoche'], $_POST['modelo']);

    
    $_SESSION['vehiculos'][] = base64_encode(serialize($nuevoCoche));

   
    $vehiculosTotales[] = $nuevoCoche;
}

// Recoge la acción seleccionada y la mete en el array
if (isset($_POST['vehiculoAccion'])) {
    $indice = (int)$_POST['vehiculoAccion'];

    if (isset($vehiculosTotales[$indice])) {
        $vehiculo_activo = $vehiculosTotales[$indice];

        if (isset($_POST['quemarRueda'])) {
            $resultado_accion = $vehiculo_activo->quemarRueda();
        }

        if (isset($_POST['hacerCaballito'])) {
            $resultado_accion = $vehiculo_activo->hacerCaballito();
        }

        if (isset($_POST['recorrer']) && isset($_POST['kmRecorrer'])) {
            $km = (int)$_POST['kmRecorrer'];
            $resultado_accion = $vehiculo_activo->recorrer($km);

          
            $_SESSION['vehiculos'][$indice] = base64_encode(serialize($vehiculo_activo));

           
            $_SESSION['kilometrajeTotal'] += $km;
        }

        if (isset($_POST['mostrarKmBici']) || isset($_POST['mostrarKmCoche'])) {
            $resultado_accion = "Kilometraje: " . $vehiculo_activo->getKilometraje() . " km";
        }
    }
}

if (isset($_POST['kmtotales'])) {
    $resultado_accion = "Total Global: " . $_SESSION['kilometrajeTotal'] . " km";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Vehículos</title>
</head>

<body>
    <h1>Crear vehículo</h1>
    <form action="" method="post">
        <select name="tipoVehiculo">
            <option value="coche" <?= (isset($_POST['tipoVehiculo']) && $_POST['tipoVehiculo'] == 'coche') ? 'selected' : '' ?>>Coche</option>
            <option value="bici" <?= (isset($_POST['tipoVehiculo']) && $_POST['tipoVehiculo'] == 'bici') ? 'selected' : '' ?>>Bicicleta</option>
        </select>
        <input type="submit" value="Seleccionar Tipo">
    </form>

    <?php
    // Mestra el formulario según el tipo de vehículo
    if (isset($_POST['tipoVehiculo'])) {
        if ($_POST['tipoVehiculo'] == 'bici') {
    ?>
            <h2>Crear Bici</h2>
            <form action="" method="post">
                <input type="hidden" name="tipoVehiculo" value="bici">
                <label>Marca: </label>
                <input type="text" name="marcaBici" required><br><br>
                <label>Tipo (montaña, asfalto...): </label>
                <input type="text" name="tipo" required><br>
                <input type="submit" value="Crear Bici">
            </form>
        <?php
        } else {
        ?>
            <h2>Crear Coche</h2>
            <form action="" method="post">
                <input type="hidden" name="tipoVehiculo" value="coche">
                <label>Marca: </label>
                <input type="text" name="marcaCoche" required><br><br>
                <label>Modelo: </label>
                <input type="text" name="modelo" required><br>
                <input type="submit" value="Crear Coche">
            </form>
        <?php
        }
    }

    echo "<hr>";

    // Mostrar selector solo si hay vehículos
    if (count($vehiculosTotales) > 0) {
        ?>
        <h2>Vehículos Creados (<?= count($vehiculosTotales) ?>)</h2>
        <form action="" method="post">
            <label>Elige un vehículo para interactuar:</label>
            <select name="seleccionado">
                <?php
                foreach ($vehiculosTotales as $ind => $vehiculo) {
                    
                    $tipo = (get_class($vehiculo) == 'Coche') ? ' Coche' : ' Bici';
                   
                    $marca = method_exists($vehiculo, 'getMarca') ? $vehiculo->getMarca() : 'Vehiculo';

                    // Mantener seleccionado el que se está usando
                    $selected = (isset($_POST['seleccionado']) && $_POST['seleccionado'] == $ind) ? 'selected' : '';

                    echo "<option value='$ind' $selected> $marca</option>";
                }
                ?>
            </select>
            <input type="submit" value="Elegir Vehículo">
        </form>
    <?php
    } else {
        echo "<p>No hay vehículos creados todavía.</p>";
    }

    // Mostrar Resultado de la acción
    if ($resultado_accion) {
        echo "<h3>Resultado: " . $resultado_accion . "</h3>";
    }
    ?>

    <br>
    <form action="" method="post">
        <input type="submit" name="kmtotales" value="Ver Kilómetros Totales Globales">
    </form>
    <br>

    <?php
    // Menú de acciones segun el tipo de vehiculo
    if (isset($_POST['seleccionado']) && isset($vehiculosTotales[$_POST['seleccionado']])) {
        $indiceSelec = (int)$_POST['seleccionado'];
        $vehiculoSelec = $vehiculosTotales[$indiceSelec];
    ?>

        <h3>Acciones para: <?= get_class($vehiculoSelec) ?></h3>

        <form action="" method="post">
            <input type="hidden" name="seleccionado" value="<?= $indiceSelec ?>"> <input type="hidden" name="vehiculoAccion" value="<?= $indiceSelec ?>">

            <label>Kilómetros a recorrer:</label>
            <input type="number" name="kmRecorrer" min="1" required>
            <input type="submit" name="recorrer" value="Recorrer">
        </form>
        <br>

        <?php if (get_class($vehiculoSelec) == "Coche") { ?>
            <form action="" method="post">
                <input type="hidden" name="seleccionado" value="<?= $indiceSelec ?>">
                <input type="hidden" name="vehiculoAccion" value="<?= $indiceSelec ?>">
                <input type="submit" name="quemarRueda" value=" Quemar Rueda">
                <input type="submit" name="mostrarKmCoche" value=" Ver KMs">
            </form>
        <?php } else { ?>
            <form action="" method="post">
                <input type="hidden" name="seleccionado" value="<?= $indiceSelec ?>">
                <input type="hidden" name="vehiculoAccion" value="<?= $indiceSelec ?>">
                <input type="submit" name="hacerCaballito" value=" Hacer Caballito">
                <input type="submit" name="mostrarKmBici" value="Ver KMs">
            </form>
        <?php } ?>

    <?php
    }
    ?>
</body>

</html>