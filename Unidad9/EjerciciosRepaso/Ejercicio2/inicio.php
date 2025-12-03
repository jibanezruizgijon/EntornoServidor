<?php
include_once 'Liga.php';
include_once 'Funciones.php';

if (session_status() == PHP_SESSION_NONE) session_start();

// Si aún no se ha iniciado sesión, se crea vacío
if (!isset($_SESSION['login']) && empty($_POST['correo'])) {
    $_SESSION['login'] = [];
    header('Location: login.php');
}

// Si destruimos la sesión actual de un determinado usuario, nos redirigue a login
if (isset($_POST['destroy_sesion'])) {
    $_SESSION['liga'][$_SESSION['login']] = [];
    $_SESSION['totalJugadores'] = 0;
    header('Location: login.php');
}

// Si ya has iniciado sesión, se almacena en el array sesión de login
if (isset($_POST['correo'])) {
    $_SESSION['login'] = $_POST['correo'];
}

// Si no se ha creado aún la liga, se crea vacía
if (!isset($_SESSION['liga'])) {
    $_SESSION['liga'] = [];
}

// Recogida de datos del formulario para la creación de la liga
if (isset($_POST['equipo'])) {
    $liga = new Liga($_POST['equipo'], $_POST['estadio'], $_POST['numJugadores']);

    // Cada liga pertenece a un usuario distinto
    $_SESSION['liga'][$_SESSION['login']][] = serialize($liga);

    agregarEquipo($_POST['equipo'], $_SESSION['login']);

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
        }
        table{
            display: flex;
            justify-content: center;
            width: 40%;
            margin-left: 20rem;
        }
    </style>
</head>

<body>
    <h2>Has iniciado sesión con <?= $_SESSION['login'] ?></h2>

    <form action="#" method="post">
        Introduce el equipo para la Liga<br>
        <input type="text" name="equipo" required><br>
        Introduce el nombre del estadio<br>
        <input type="text" name="estadio"><br>
        ¿Cuántos jugadores contiene el equipo?<br>
        <input type="number" name="numJugadores"><br><br>

        <input type="submit" value="Crear Equipo">
    </form><br>

    <table border="5px solid black">
        <tr>
            <th>Equipo</th>
            <th>Estadio</th>
            <th>Total Jugadores</th>
        </tr>
        <tr>
            <?php
            if (isset($_SESSION['liga'][$_SESSION['login']])) {
                foreach ($_SESSION['liga'][$_SESSION['login']] as $liga) {
                    $liga = unserialize($liga);
                    echo '<tr><td>' . $liga->getEquipo() . '</td>';
                    echo '<td>' . $liga->getEstadio() . '</td>';
                    echo '<td>' . $liga->getNumJugadores() . '</td></tr>';
                }
            }
            ?>
        </tr>
    </table><br>


    <form action="#" method="post">
        <input type="submit" value="Cerrar sesión" name="destroy_sesion">
    </form>
    <a href="login.php">Regresar</a>
</body>

</html>