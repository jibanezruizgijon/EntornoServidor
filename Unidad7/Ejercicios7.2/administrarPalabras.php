<?php
if ( session_status() == PHP_SESSION_NONE) { session_start(); }
//Para eliminar las cookies y reiniciar las palabras por defecto
// if (isset($_POST['reiniciar'])) {
//     setcookie("diccionario", NULL, -1);
//     unset($diccionario);
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Palabras</title>
    <style>
        div {
            display: flex;
        }

        form {
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <h1>Administración de palabras</h1>
    <hr>
    <div>
        <form action="addPalabra.php" method="post">
            <input type="submit" value="Añadir nueva palabra">
        </form>

        <form action="" method="post">
            <input type="hidden" name="reiniciar">
            <input type="submit" value="Reiniciar a diccionario por defecto">
        </form>

        <form action="ejercicio8.php" method="post">
            <input type="submit" value="Regresar a página principal">
        </form>
    </div>

    <hr>

    <table>
        <tr>
            <th>Inglés</th>
            <th>Español</th>
        </tr>
        <?php
        //   for ($i=0; $i < diccionario.length; $i++) { 
        //     # code...
        //   }  
        ?>
    </table>
    <?php
    print_r($_SESSION['diccionario']);
    ?>
</body>

</html>