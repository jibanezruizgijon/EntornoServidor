<?php
require_once '../Model/Cliente.php';
$data['cliente'] = Cliente::getClienteById($_REQUEST['id']);

include '../View/actualizaCliente_view.php';