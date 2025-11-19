<?php
class Empleado
{
    private $nombre;
    private $sueldo;

    public function __construct($nom, $su)
    {
        $this->nombre = $nom;
        $this->sueldo = $su;
    }

    public function asigna($nombre1, $sueldo)
    {
        if ($this->nombre = $nombre1) {
            $this->sueldo = $sueldo;
        }
    }

    public function impuestos()
    {
        $impuestos = "";
        if ($this->sueldo >= 3000) {
            $impuestos = "Debe pagar impuestos";
        } else {
            $impuestos = "No debe pagar impuestos";
        }
        return $this->sueldo . " " . $impuestos;
    }

    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }


    public function getSueldo()
    {
        return $this->sueldo;
    }


    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;

        return $this;
    }
}
