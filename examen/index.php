<?php

include_once "Receta.php";

if (session_status() == PHP_SESSION_NONE) session_start();

// Crea la sesión recetas la primera vez
if (!isset($_SESSION['recetas'])) {
    $_SESSION['recetas'] = [];
}

if (isset($_COOKIE['ficheros']) && !isset($_SESSION['ficheros'])) {
    $_SESSION['ficheros'] = unserialize(base64_decode($_COOKIE['ficheros']));
}

// En caso de pulsar empezar Nuevo borra las recetas
if (isset($_POST['empezar'])) {
    unset($_SESSION['recetas']);
}

// Guarda la receta en un objeto
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];

    $recetaNueva = new Receta($nombre, $tipo);

    if (isset($_POST['sal'])) {
        $recetaNueva->añadirIngredientes($_POST['sal']);
    }
    if (isset($_POST['aceite'])) {
        $recetaNueva->añadirIngredientes($_POST['aceite']);
    }
    if (isset($_POST['ajo'])) {
        $recetaNueva->añadirIngredientes($_POST['ajo']);
    }
    if (isset($_POST['pimiento'])) {
        $recetaNueva->añadirIngredientes($_POST['pimiento']);
    }
    if (isset($_POST['tomate'])) {
        $recetaNueva->añadirIngredientes($_POST['tomate']);
    }

    $_SESSION['recetas'][$recetaNueva->getCodigo()] = base64_encode(serialize($recetaNueva));
}

// Añadir Ingrediente a una receta
if (isset($_POST['nuevoIngrediente'])) {

    $recetaElegida = $_POST['recetaElegida'];
    foreach ($_SESSION['recetas'] as $recetas => $receta) {
        $recetaMostrar = unserialize(base64_decode($receta));

        if ($recetaElegida == $recetaMostrar->getCodigo()) {
            $recetaMostrar->añadirIngredientes($_POST['nuevoIngrediente']);
            unset($_SESSION['recetas'][$recetas]);
            $_SESSION['recetas'][] = base64_encode(serialize($recetaMostrar));
        }
    }
}

// Para guardar ficheros 
if (isset($_POST['ficheroNuevo'])) {
    $fichero = trim($_POST['ficheroNuevo']);
    $fp = fopen($fichero, "a");

    foreach ($_SESSION['recetas'] as $recetas => $receta) {
        $recetaMostrar = unserialize(base64_decode($receta));
        fwrite($fp, $recetaMostrar->getCodigo() . "," . $recetaMostrar->getNombre()  . "," .  $recetaMostrar->getTipo()  . "," . $recetaMostrar->getIngredientes() . PHP_EOL);
    }

    fclose($fp);

    $_SESSION['ficheros'][] = $fichero;

    setcookie("ficheros", "", -1);

    setcookie("ficheros",  base64_encode(serialize($_SESSION['ficheros'])), time() + 3 * 12 * 4 * 7 * 24 * 60 * 60);
}

// Para Cargar archivo existente
if (isset($_POST['ficheroCargar'])) {
    if (file_exists($_POST['ficheroCargar'])) {
        $fp = fopen($_POST['ficheroCargar'], "r");


        fclose($fp);
    }
}

$tipos = ["entrante", "principal", "postre"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
    <style>
        .header {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .title {
            margin-right: 30px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1 class="title">MIS RECETAS</h1>
        <!-- CARGAR FICHERO-->
        <form action="" method="post">
            <label for="ficheroCargar">Cargar Fichero:</label>
            <select name="ficheroCargar">
                <?php
                foreach ($_SESSION['ficheros'] as $fichero) {
                    echo "<option value='$fichero'> $fichero </option>";
                }
                ?>
            </select>
            <input type="submit" value="OK">
        </form>
        <!-- GUARDAR RECETAS EN FICHERO -->
        <form action="" method="post">
            <label for="">Guardar recetas en fichero:</label>
            <input type="text" name="ficheroNuevo">
            <input type="submit" value="OK">
        </form>

        <!-- BORRA LAS RECETAS -->
        <form action="" method="post">
            <input type="submit" name="empezar" value="EMPEZAR NUEVO">
        </form>
    </div>
    <?php
    if (isset($_POST['ficheroNuevo'])) {
    ?>
        <h3 style="color: green;">Fichero Guardado Correctamente</h3>
    <?php
    }

    if (isset($_POST['ficheroCargar'])) {
    ?>
        <h3 style="color: green;">Fichero Cargado Correctamente</h3>
    <?php
    }
    ?>
    <hr>
    <!-- FORMULARIO PARA AÑADIR RECETA -->
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <label for="">Tipo:</label>
        <select name="tipo" required>
            <?php
            foreach ($tipos as $tipo) {
                echo "<option value='$tipo'> $tipo  </option>";
            }
            ?>
        </select>
        <br>
        <label for="ingredientes">Ingredientes básicos</label>
        <br>
        <input type="checkbox" name="sal" value="sal">Sal
        <br><input type="checkbox" name="aceite" value="aceite">Aceite
        <br><input type="checkbox" name="ajo" value="ajo">Ajo
        <br><input type="checkbox" name="pimiento" value="pimiento">Pimiento
        <br><input type="checkbox" name="tomate" value="tomate">Tomate
        <br><br>
        <input type="submit" value="AÑADIR">
    </form>

    <hr>
    <!-- TABLA PARA MOSTRAR RECETAS -->
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
            if (isset($_SESSION['recetas'])) {
                foreach ($_SESSION['recetas'] as $recetas => $receta) {
                    $recetaMostrar = unserialize(base64_decode($receta));
                    echo "<tr>";
                    echo "<td>" . $recetaMostrar->getCodigo() . "</td>";
                    echo "<td>" . $recetaMostrar->getNombre() . "</td>";
                    echo "<td>" . $recetaMostrar->getTipo() . "</td>";
                    echo "<td>" . $recetaMostrar->getMostrarIngredientes() . "</td>";
            ?>
                    <td>
                        <form action="" method="post">
                            <input type="text" name="nuevoIngrediente" required>
                            <input type="submit" value="Añadir Ingrediente nuevo">
                            <input type="hidden" name="recetaElegida" value="<?= $recetaMostrar->getCodigo() ?>">
                        </form>
                    </td>
            <?php
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <hr>
    <!-- FORMULARIO PARA BUSCAR RECETA POR INGREDIENTE -->
    <form action="consultas.php" method="post">
        <label for="">Selecciona un ingrediente para ver la receta que lo incluyen</label>
        <br>
        <select name="ingrediente">
            <?php
            $arrayIngredientes = Receta::getListaIngredientes();

            foreach ($arrayIngredientes as $Ingredientes => $ingrediente) {
                echo "<option> $ingrediente </option>";
            }
            ?>
        </select>
        <input type="submit" value="Consultar">
    </form>
    <hr>
</body>

</html>