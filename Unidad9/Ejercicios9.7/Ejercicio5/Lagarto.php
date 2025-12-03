<?php
  include_once "Animal.php";
  
  class Lagarto extends Animal{
    private $escamas;


    public function __construct($s, $ed, $pe, $es) {
        parent::__construct($s, $ed, $pe);
        $this->escamas = $es;
    }


    public function __toString()
    {
        return parent::__toString() . "escamas: $this->escamas";
    }
  }
?>