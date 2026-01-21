<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_POST['eliminar'])) {
    $_SESSION['carrito'][$_POST['codigo']]["unidades"]--;
    if ($_SESSION['carrito'][$_POST['codigo']]["unidades"] <= 0) {
        unset($_SESSION['carrito'][$_POST['codigo']]);
    }
}

header("Location: ../Controller/mostrarCarrito.php");