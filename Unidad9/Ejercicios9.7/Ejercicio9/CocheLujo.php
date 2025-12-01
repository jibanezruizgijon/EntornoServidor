<?php
include_once "Coche.php";

class CocheLujo extends Coche
{
    private $suplemento;


    public function __construct($mat, $mod, $pre, $supl)
    {
        parent::__construct($mat, $mod, $pre);
        $this->suplemento = $supl;
    }

    /**
     * Get the value of suplemento
     */ 
    public function getSuplemento()
    {
        return $this->suplemento;
    }

    /**
     * Set the value of suplemento
     *
     * @return  self
     */ 
    public function setSuplemento($suplemento)
    {
        $this->suplemento = $suplemento;

        return $this;
    }
}

?>