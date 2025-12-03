<?php
  include_once "Vehiculo.php";
  
  class Coche extends Vehiculo{

    private $modelo;

    public function __construct($marca, $modelo) {
      parent::__construct($marca);
      $this->modelo = $modelo;
    }


    public function quemarRueda(){
      return "Estás derrapando con el coche";
    }

    /**
     * Get the value of modelo
     */ 
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of modelo
     *
     * @return  self
     */ 
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }
  }
?>