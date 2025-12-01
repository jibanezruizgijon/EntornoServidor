<?php
include_once "DadoPoker.php";

if (session_status() == PHP_SESSION_NONE) session_start();


if (isset($_POST['nuevaTiradas'])) {
    # code...
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DadoPoker</title>
</head>

<body>
    <h1>Prueba objeto DadoPoker</h1>
    <form action="" method="post">
        <table border='1px'>
            <tr>
                <td colspan="5">Dado Poker</td>
            </tr>

            <tr>
                <td>Dado 1 </td>
                <td>Dado 2 </td>
                <td>Dado 3 </td>
                <td>Dado 4 </td>
                <td>Dado 5 </td>
            </tr>
            <tr>
                <td>As</td>
                <td>K</td>
                <td>Q</td>
                <td>J</td>
                <td>7</td>
                <td>8</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="1"></td>
                <td><input type="checkbox" name="2"></td>
                <td><input type="checkbox" name="3"></td>
                <td><input type="checkbox" name="4"></td>
                <td><input type="checkbox" name="5"></td>
                <td><input type="checkbox" name="6"></td>
            </tr>
        </table>
    </form>
</body>

</html>