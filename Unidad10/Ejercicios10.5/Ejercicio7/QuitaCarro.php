<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_POST['id'])) {

    if ($_SESSION['carro'][$_POST['id']]['unidades'] > 1) {
        $_SESSION['carro'][$_POST['id']]['unidades']--;
    } else {
        unset($_SESSION['carro'][$_POST['id']]);
    }


    $carritoSer = base64_encode(serialize($_SESSION['carro']));
    setcookie("carro", $carritoSer, time() + 60 * 60 * 24);
    header("Location: Cesta.php");
    exit();
} else {
    header("Location: index.php");
    exit();
}
