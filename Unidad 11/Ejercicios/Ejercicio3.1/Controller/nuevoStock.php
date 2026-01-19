<?php
// Carga la vista del formulario de alta del artículo
if ($_POST['entrada']) {
    include '../View/añadirStock_view.php';
} else {
    include '../View/reducirStock_view.php';
}
