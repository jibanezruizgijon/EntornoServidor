<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina</title>
    <style>
        body {
            text-align: center;
        }

        table {
            background: url("img/guepardo.jpg") no-repeat;
            margin: auto;
            border-collapse: collapse;
        }

        td {
            border: 1px solid white;
        }

        a {
            padding: 28px;
            display: block;
            width: 100%;
            height: 100%;
            text-decoration: none;
        }

        img {
            width: 400px;
            height: 400px;
            display: block;
        }
    </style>
</head>

<body>
    <?php
    $intentos = isset($_GET['intentos'])? $_GET['intentos'] : 8;
    // Para empezar inicia el array con todos 0 para que se vea
    if (!isset($_GET['cadena'])) {
        $numeros =  array_fill(1, 101, 0);
    } else {
            // Al volver de comprueba me da un error porque no pasa  numero
            if (isset($_GET['num'])) {
               $num = $_GET['num'];
            }
            $cadena = $_GET['cadena'];
            $numeros = explode(",", $cadena);
            $numeros[$num] = 1;
            $intentos--;
    }
    if ($intentos <=0) {
        // En caso de no tener más intentos quita la opcioón de seguir y muestra la imagen
        ?>
        <h3>Te has quedado sin intentos</h3>
       <img src="img/guepardo.jpg" alt="gueapardo" style="margin-left: auto; margin-right: auto;">
        <?php
    } else{
    ?>
    <h3>Te quedan <?= $intentos ?> </h3>
    <table>
        <tr>
            <?php
            for ($i = 1; $i <= 100; $i++) {
                // Comprueba en el array si es 0 o 1 para darle transparencia
                $estilo = $numeros[$i] == 1 ? "rgba(0, 0, 0, 0)" : "rgba(0,0,0,1)";
            ?>
                <td style=background-color:<?= $estilo ?>><a href="ejercicio3.php?num=<?= $i ?>&intentos=<?= $intentos ?>&cadena=<?= implode(",", $numeros) ?>"></a></td>
            <?php
                if ($i  % 10 == 0) echo "</tr><tr>";
            }
            ?>
        </tr>
    </table>
    <br>
    <form action="comprueba3.php" method="get">
        <label for="">Adivina la imagen:</label>
        <input type="text" name="palabra">
        <input type="hidden" name="intentos" value="<?= $intentos ?>">
        <input type="hidden" name="cadena" value="<?= implode(",", $numeros) ?>">
        <input type="submit" value="Confirmar">
    </form>
    <?php
    }
        
    ?>
</body>

</html>