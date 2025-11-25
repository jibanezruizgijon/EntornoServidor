<?php
class Vehiculo
{
 
    private static $KmTotales = 0;
    private static $vehiculosCreados = 0;
    private  $KmRecorridos = 0;
    private $marca;


    public function __construct($mar)
    {
        $this->marca = $mar;
        Vehiculo:: $vehiculosCreados++;
    }

     public function recorrer($km)
    {
        $this->KmRecorridos += $km;
        Vehiculo::$KmTotales += $km;
    }

    public static function getKmTotales()
    {
        return Vehiculo::$KmTotales;
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

    /**
     * Get the value of vehiculosCreados
     */ 
    public static function getVehiculosCreados()
    {
        return Vehiculo::  $vehiculosCreados;
    }

    /**
     * Set the value of vehiculosCreados
     *
     * @return  self
     */ 
    public function setVehiculosCreados($vehiculosCreados)
    {
        $this->vehiculosCreados = $vehiculosCreados;

        return $this;
    }
}
