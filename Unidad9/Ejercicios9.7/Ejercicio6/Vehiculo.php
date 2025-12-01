<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['KmTotales'])) {
    $_SESSION['KmTotales'] = 0;
}

if (!isset($_SESSION['vehiculosCreados'])) {
    $_SESSION['vehiculosCreados'] = 0;
}
class Vehiculo
{


    // private static $vehiculosCreados = 0;
    private  $KmRecorridos = 0;
    private $marca;


    public function __construct($mar)
    {
        $this->marca = $mar;
        $_SESSION['vehiculosCreados']++;
    }

    public static function getVehiculosCreados()
    {
        return $_SESSION['vehiculosCreados'];
    }

    public static function getKilometrajeTotal()
    {
        return $_SESSION['KmTotales'];
    }
    public function recorrer($km)
    {
        $this->KmRecorridos += $km;
        $_SESSION['KmTotales'] += $km;
        return "Has recorrido $km km";
    }

    public static function getKmTotales()
    {
        return  "Has recorrido: " . $_SESSION['KmTotales'] . " km totales";
    }

    public function getKilometraje()
    {
        return $this->KmRecorridos;
    }


    /**
     * Get the value of marca
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     *
     * @return  self
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }
}
