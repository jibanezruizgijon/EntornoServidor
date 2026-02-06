<?php

require_once 'Model/Alumno.php';
require_once 'Model/Alumno-asignatura.php';
require_once 'Model/Asignatura.php';

// Configuración básica
$metodo = $_SERVER['REQUEST_METHOD'];
$codEstado = 200;
$mensaje = "OK";
$datosDevolver = [];