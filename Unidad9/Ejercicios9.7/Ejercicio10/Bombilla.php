<?php
  if (session_status() == PHP_SESSION_NONE) session_start();
  
  if (!isset($_SESSION['generalActivo'])) {
  $_SESSION['generalActivo'] = true;

  $_SESSION['potenciaGeneral'] = 0;
}

class Bombilla{
    public static function getGeneral(){
      return $_SESSION['generalActivo'];
    }

    public static function getPotenciaGeneral(){
      if ($_SESSION['generalActivo']) {
        return $_SESSION['potenciaGeneral'];
      } else{
        return 0;
      }
    }

    private $estaEncendida;
    private $potencia;
    private $ubicación;


    public function __construct($encendida, $pot, $ubic) {
        $this->estaEncendida = $encendida;
        $this->potencia = $pot;
        $this->ubicación = $ubic;
    }


    public function gastoActual(){
        if($this->estaEncendida){
            return $this->potencia;
        } else {
            return 0;
        }
    }

    /**
     * Get the value of estaEncendida
     */ 
    public function getEstaEncendida()
    {
        return $this->estaEncendida;
    }

    /**
     * Set the value of estaEncendida
     *
     * @return  self
     */ 
    public function setEstaEncendida($estaEncendida)
    {
        $this->estaEncendida = $estaEncendida;

        return $this;
    }

    /**
     * Get the value of potencia
     */ 
    public function getPotencia()
    {
        return $this->potencia;
    }

    /**
     * Set the value of potencia
     *
     * @return  self
     */ 
    public function setPotencia($potencia)
    {
        $this->potencia = $potencia;

        return $this;
    }

    /**
     * Get the value of ubicación
     */ 
    public function getUbicación()
    {
        return $this->ubicación;
    }

    /**
     * Set the value of ubicación
     *
     * @return  self
     */ 
    public function setUbicación($ubicación)
    {
        $this->ubicación = $ubicación;

        return $this;
    }
}
?>