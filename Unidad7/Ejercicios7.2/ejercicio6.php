<?php
session_start();
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [
        ['nombre' => 'Air Force 1', 'precio' => 80, 'img' => 'img/force1.jpg', 'descripcion' => 'Cómodas, duraderas y atemporales: son las número 1 por una razón. El diseño clásico de los 80 se combina con piel lisa y detalles llamativos para conseguir un estilo perfecto tanto en la cancha como fuera de ella.','unidades' => 0],
        ['nombre' => 'Air Max Plus', 'precio' => 189, 'img' => 'img/max_plus.jpg', 'descripcion' => "Deja que tu estilo se eleve con las Air Max Plus. La emblemática estructura añade estilo a tu look y la malla transpirable mantiene la frescura. La amortiguación visible te permite rendir homenaje a tu estilo desafiante con comodidad.", 'unidades' => 0],
        ['nombre' => 'Air Jordan 1', 'precio' => 140, 'img' => 'img/jordan1.png', 'descripcion' => "Inspirada en las AJ1 originales, esta edición de perfil medio mantiene el look icónico que más te gusta, y los colores elegidos y la piel impecable aportan una identidad distintiva.", 'unidades' => 0],
        ['nombre' => 'Pegasus 41', 'precio' => 150, 'img' => 'img/pegasus.jpg', 'descripcion' => "La amortiguación reactiva de las Pegasus ofrece una pisada enérgica para el running diario sobre asfalto", 'unidades' => 0],
        ['nombre' => 'Mercurial vapor 16', 'precio' => 260, 'img' => 'img/mercurial.png', 'descripcion' => "¿Te obsesiona la velocidad? A las estrellas de fútbol también. Por eso hemos diseñado estas botas Elite con una unidad Air Zoom de 3/4 mejorada", 'unidades' => 0]
    ];
    $_SESSION['total'] = 0;
} else {
    $compra = (isset($_POST['compra'])) ? $_POST['compra'] : " ";
    $eliminar = (isset($_POST['eliminar'])) ? $_POST['eliminar'] : " ";
    foreach ($_SESSION['productos'] as $productos => $datos) {
        if ($compra == $datos['nombre']) {
            $_SESSION['productos'][$productos]["unidades"]++;
            $_SESSION['total'] += $datos["precio"];
        }

        if ($eliminar == $datos['nombre']) {
            $_SESSION['productos'][$productos]["unidades"]--;
            $_SESSION['total'] -= $datos["precio"];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio6</title>

    <style>
        * {
            font-family: sans-serif;
        }

        body {
            background-color: rgb(209, 232, 255);
        }

        header {
            width: 100%;
            text-align: center;
            background-color: rgb(53, 188, 230);
        }

        .container {
            position: relative;
            padding-left: 20px;
            padding-right: 20px;
        }

        section {
            float: left;
        }

        .compra {
            width: 55%;
            margin-right: 30px;
            margin-left: 50px;
        }

        .muestra {
            width: 30%;
        }

        img {
            width: 150px;
            height: 150px;
        }
    </style>
</head>

<body>
    <header>
        <h1>Tienda Online de zapatos</h1>
        <h2>NIKE</h2>
    </header>
    <div class="container">
        <section class="compra">
            <h3>Productos</h3>
            <hr>
            <?php
            foreach ($_SESSION['productos'] as $productos => $datos) {
                echo "<img src=" . $datos["img"] . ">";
                echo "<h3>" . $datos["nombre"] .  "</h3>";
                echo "<h3> Precio:" . $datos["precio"] .  "€</h3>";
            ?>
                <form action="" method="post">
                    <input type="hidden" name="compra" value="<?= $datos["nombre"] ?>">
                    <input type="submit" value="comprar">
                </form>
                <br>
                <form action="detalles.php" method="post">
                    <input type="hidden" name="detalle" value="<?= $datos["nombre"] ?>">
                    <input type="submit" value="Detalles">
                </form>
                <br><br>
            <?php
            }
            ?>
        </section>
        <section class="muestra">
            <h3>Carrito</h3>
            <hr>
            <?php
            foreach ($_SESSION['productos'] as $productos => $datos) {
                if ($datos["unidades"] != 0) {
                    echo "<img src=" . $datos["img"] . ">";
                    echo "<h3>" . $datos["nombre"] .  "</h3>";
                    echo "<h3> Precio:" . $datos["precio"] .  "€</h3>";
                    echo "<h3>Unidades:" . $datos["unidades"] . "</h3>";

            ?>
                    <form action="" method="post">
                        <input type="hidden" name="eliminar" value="<?= $datos["nombre"] ?>">
                        <input type="submit" value="eliminar">
                    </form>
            <?php
                }
                echo "<br>";
            }
            echo "<h3>Precio total: " . $_SESSION['total'] . "</h3>";
            ?>
        </section>
    </div>
</body>

</html>