<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_POST['eliminar'])) {
    $_SESSION['cesta'][$_POST['id']]["unidades"]--;
    if ($_SESSION['cesta'][$_POST['id']]["unidades"] <= 0) {
        unset($_SESSION['cesta'][$_POST['id']]);
    }
}

header("Location: ../Controller/mostrarCesta.php");