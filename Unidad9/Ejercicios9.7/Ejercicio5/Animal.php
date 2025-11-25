<?php

abstract class Animal
{
    private $sexo;
    private $edad;
    private $peso;

    public function __construct($s = "macho", $ed, $pe)
    { 
        $this->edad = $ed;
        $this->peso = $pe;
        $this->sexo = $s;
    }

    public function duerme()
    {
        return "Zzzzzzz<br>";
    }

    public function alerta()
    {
        return "Estoy atento a las presas<br>";
    }

    public function __toString()
    {
        return "Sexo: $this->sexo, edad: $this->edad, peso:$this->peso";
    }

    /**
     * Get the value of sexo
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set the value of sexo
     *
     * @return  self
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get the value of edad
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set the value of edad
     *
     * @return  self
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get the value of peso
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set the value of peso
     *
     * @return  self
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }
}
