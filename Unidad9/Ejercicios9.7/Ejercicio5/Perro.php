<?php
  include_once 'Mamifero.php';

  class Perro extends Mamifero{

    private $raza;
    
    public function __construct($s , $ed, $pe, $ra) {
        $this->raza = $ra;
    }

    /**
     * Get the value of raza
     */ 
    public function getRaza()
    {
        return $this->raza;
    }

    /**
     * Set the value of raza
     *
     * @return  self
     */ 
    public function setRaza($raza)
    {
        $this->raza = $raza;

        return $this;
    }
  }
?>