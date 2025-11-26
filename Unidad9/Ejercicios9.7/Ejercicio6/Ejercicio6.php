<?php
include_once "Vehiculo.php";
include_once "Coche.php";
include_once "Bicicleta.php";

if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['vehiculos'])) {
    $_SESSION['vehiculos'] = [];
}
$resultado_accion = "";
if (isset($_POST['marcaBici'])) {
    $_SESSION['vehiculos'][] = new Bicicleta($_POST['marcaBici'], $_POST['tipo']);
}

if (isset($_POST['marcaCoche'])) {
    $_SESSION['vehiculos'][] = new Coche($_POST['marcaCoche'], $_POST['modelo']);
}

if (isset($_POST['vehiculoAccion'])) {
    $indice = (int)$_POST['vehiculoAccion'];
    $vehiculo_activo = $_SESSION['vehiculos'][$indice] ?? null;

    if ($vehiculo_activo) {
        if (isset($_POST['quemarRueda'])) {

            $resultado_accion = $vehiculo_activo->quemarRueda();
        }
        if (isset($_POST['hacerCaballito'])) {

            $resultado_accion = $vehiculo_activo->hacerCaballito();
        }
        if (isset($_POST['recorrer']) && is_numeric($_POST['km_recorrer'])) {
            $km = (int)$_POST['km_recorrer'];

            $resultado_accion = $vehiculo_activo->recorrer($km);
            $_SESSION['vehiculos'][$indice] = $vehiculo_activo;
        }
        if (isset($_POST['mostrarKmBici'])) {
            $resultado_accion = $vehiculo_activo->getKilometraje() . "km";
        }

        if (isset($_POST['mostrarKmCoche'])) {
            $resultado_accion = $vehiculo_activo->getKilometraje() . "km";
        }
    }
}

if (isset($_POST['kmtotales'])) {
    $resultado_accion = $_SESSION['kilometrajeTotal'];
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
    <h1>Crear vehículo</h1>
    <form action="" method="post">
        <select name="tipoVehiculo">
            <option value="coche">coche</option>
            <option value="bici">Bicicleta</option>
        </select>
        <input type="submit" value="Confirmar">
    </form>

    <?php
    if (isset($_POST['tipoVehiculo'])) {
        if ($_POST['tipoVehiculo'] == 'bici') {
    ?>
            <h2>Crear Bici</h2>
            <form action="" method="post">
                <label>marca: </label>
                <input type="text" name="marcaBici" required>
                <br><br>
                <label>tipo(montaña,asfalto...): </label>
                <input type="text" name="tipo" required>
                <br>
                <input type="submit" value="Crear">
            </form>
        <?php
        } else {
        ?>
            <h2>Crear Coche</h2>
            <form action="" method="post">
                <label>marca: </label>
                <input type="text" name="marcaCoche" required>
                <br><br>
                <label>modelo: </label>
                <input type="text" name="modelo" required>
                <br>
                <input type="submit" value="Crear">
            </form>
        <?php
        }
    }
    echo "<br>";
    if (count($_SESSION['vehiculos']) > 0) {
        ?>
        <h2>Vehículos Creados</h2>
        <form action="" method="post">
            <select name="seleccionado">
                <?php
                $contador = 0;
                foreach ($_SESSION['vehiculos'] as $vehiculo) {
                    $marca = $vehiculo->getMarca();
                    echo "<option value='$contador'>$marca</option>";
                    $contador++;
                }
                ?>
            </select>
            <input type="submit" value="Elegir">
        </form>
    <?php
    }

    if ($resultado_accion) {
        echo "<h3>Resultado:" . $resultado_accion . "</h3>";
    }
    ?>
    <br>
    <form action="" method="post">
        <input type="submit" name="kmtotales" value="Kilometros Totales">
    </form>
    <br>
    <?php
    // Comprobar si se ha elegido un coche o bici y muestra las opciones
    if (isset($_POST['seleccionado'])) {
        $indiceSelec = (int)$_POST['seleccionado'];
        $vehiculoSelec =  $_SESSION['vehiculos'][$_POST['seleccionado']];

    ?>
        <form action="" method="post">
            <input type="hidden" name="vehiculoAccion" value="<?= $indiceSelec ?>">
            <label>Kilómetros a recorrer:</label>
            <input type="number" name="km_recorrer" min="1" required>
            <input type="submit" name="recorrer" value="Recorrer">
        </form>
        <br>

        <?php
        if (get_class($vehiculoSelec) == "Coche") {
        ?>
            <h2>Acciones con el coche</h2>
            <form action="" method="post">
                <input type="hidden" name="vehiculoAccion" value="<?= $indiceSelec ?>">
                <input type="submit" name="quemarRueda" value="quemar rueda">
            </form>
            <br>
            <form action="" method="post">
                <input type="hidden" name="vehiculoAccion" value="<?= $indiceSelec ?>">
                <input type="submit" name="mostrarKmCoche" value="Mostrar Kilómetros">
            </form>
        <?php
        } else {
        ?>
            <h2>Acciones con la Bicicleta</h2>
            <form action="" method="post">
                <input type="hidden" name="vehiculoAccion" value="<?= $indiceSelec ?>">
                <input type="submit" name="hacerCaballito" value="hacer caballito">
            </form>
            <br>
            <form action="" method="post">
                <input type="hidden" name="vehiculoAccion" value="<?= $indiceSelec ?>">
                <input type="submit" name="mostrarKmBici" value="Mostrar Kilómetros">
            </form>
    <?php
        }
    }
    ?>
</body>

</html>