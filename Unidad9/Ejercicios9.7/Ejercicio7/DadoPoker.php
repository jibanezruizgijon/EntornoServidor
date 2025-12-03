<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if(!isset($_SESSION['tiradastTotales'])){
  $_SESSION['tiradastTotales'] = 0;
  $_SESSION['caras']= [ 'As', 'K', 'Q', 'J', '7' , '8'];
}
  class DadoPoker{

    public function __construct() {
      $this->tirar;
    }
    public function numSacado(){
      return ; 
    }

    public function tirar(){
      $this-> numSacado = rand(0,5);
       $_SESSION['tiradastTotales']++;
    }

    public function __toString()
    {
      throw new \Exception('Not implemented');
    }
  }  
?>