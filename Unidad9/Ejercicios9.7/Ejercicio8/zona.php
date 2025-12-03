<?php
  if (session_status() == PHP_SESSION_NONE) session_start();
  
  
class Zona {
    private $nomrbe;



    public function __construct($nombre) {
        $this->nombre = $nombre;
    }



 public function venderEntradas(){
    if($ventas <= $this->entradasActuales){
        $this->entradasActuales -= $ventas;
        Zona::ingresar($ventas*$this->precioEntrada)
    }
  }

}
?>