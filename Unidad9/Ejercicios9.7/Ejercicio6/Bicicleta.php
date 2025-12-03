<?php
  include_once "Vehiculo.php";
  
  class Bicicleta extends Vehiculo{

    private $tipo;

    public function __construct($marca, $tipo) {
     parent::__construct($marca);
     $this->tipo = $tipo;
    }


    public function hacerCaballito(){
      return "Estás haciendo el caballito con la bicicleta";
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }
  }
?>