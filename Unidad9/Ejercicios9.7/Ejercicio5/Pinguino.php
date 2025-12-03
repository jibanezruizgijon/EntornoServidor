<?php
include_once "Ave.php";

class Pinguino extends Ave
{
    public function __construct($s, $ed, $pe)
    {
        parent::__construct($s, $ed, $pe);
    }

    public function vuela()
    {
        return "No puedo volar<br>";
    }
}
