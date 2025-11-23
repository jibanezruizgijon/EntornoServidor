<?php
include_once "Ave.php";

class Canario extends Ave
{

    private $color;

    public function __construct($s, $ed, $pe, $co)
    {
        parent::__construct($s, $ed, $pe);
        $this->color = $co;
    }

    public  function __toString()
    {
        return parent::__toString() . ",color: $this->color";
    }

    public function piar(){
        return "pio pio pio";
    }
}
