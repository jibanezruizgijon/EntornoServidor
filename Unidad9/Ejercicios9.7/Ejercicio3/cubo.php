<?php
class cubo
{
    private $capacidad;
    private $contenidoActual;

    public function __construct($cap, $cont)
    {
        $this->capacidad = $cap;
        $this->contenidoActual = $cont;
    }

    public function verter($cantidad, $cubo2)
    {
        $resultado = "Cantidad vertida correctamente";
        if ($cubo2->getCapacidad() == $cubo2->getContenidoActual()) {
            return "El cubo está ya lleno";
        }

        if ($cantidad <= 0) {
            return "No se ha vertido cantidad";
        }

        $cantDisponible = $cubo2->getCapacidad() - $cubo2->getContenidoActual();
        
        $Verter = min($cantidad, $this->contenidoActual, $cantDisponible);

        if ($Verter <= 0) {
            return "No hay líquido suficiente para verter";
        }

        
        $this->contenidoActual -= $Verter;
        $cubo2->setContenidoActual($cubo2->getContenidoActual() + $Verter);

        return "Se han vertido $Verter litros";
    }

    /**
     * Get the value of capacidad
     */
    public function getCapacidad()
    {
        return $this->capacidad;
    }

    /**
     * Set the value of capacidad
     *
     * @return  self
     */
    public function setCapacidad($capacidad)
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    /**
     * Get the value of contenidoActual
     */
    public function getContenidoActual()
    {
        return $this->contenidoActual;
    }

    /**
     * Set the value of contenidoActual
     *
     * @return  self
     */
    public function setContenidoActual($contenidoActual)
    {
        $this->contenidoActual = $contenidoActual;

        return $this;
    }
}
