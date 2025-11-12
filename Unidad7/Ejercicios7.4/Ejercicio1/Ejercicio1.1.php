<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['cambio'])) {
    $cambio = $_REQUEST['cambio'];
    $color = $_SESSION['paleta'][$cambio];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Colores</title>
    <style>
        input {
            margin: 20px;
            padding: 10px;
        }

        body {
            background-color: rgb(<?= $color ?>);
        }
        td{
            border: 1px solid ;
            border-collapse: collapse;
            height: 50px;
            width: 50px;
        }

        a{
            height: 50px;
            width: 50px;
            display: block;
        }
        
    </style>
</head>

<body>
    <table>
        <tr>
            <?php
            for ($i = 0; $i < count($_SESSION['paleta']); $i++) {
            ?>
                <td style="background-color: rgb(<?= $_SESSION['paleta'][$i]?>);"><a href="?cambio=<?=$i?>"></a></td>
            <?php
                if (($i + 1) % 5 == 0) {
                    echo "</tr><tr>";
                }
            }
            ?>
        </tr>
    </table>

    <form action="Ejercicio1.php" method="post">
        <input type="submit" value="Página principal">
    </form>
    <br><br>
    <form action="Ejercicio1.php" method="post">
        <input type="submit" name="borrar" value="Eliminar paleta">
    </form>
</body>

</html>