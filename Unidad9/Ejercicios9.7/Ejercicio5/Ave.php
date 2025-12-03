<?php
include_once 'Animal.php';
 abstract class Ave extends Animal{

    public function __construct($s , $ed, $pe) {
        parent::__construct($s , $ed, $pe);
    }


    public function vuela(){
        return "Estoy volando<br>";
    }
 }
?>