<?php
include_once 'Animal.php';
abstract class Mamifero extends Animal
{
    private $dieta;

    public function __construct($s, $ed, $pe, $di)
    {
        parent::__construct($s, $ed, $pe);
        $this->dieta = $di;
    }

    public function __toString()
    {
        return parent::__toString() . ",dieta: $this->dieta";
    }
    /**
     * Get the value of dieta
     */
    public function getDieta()
    {
        return $this->dieta;
    }

    /**
     * Set the value of dieta
     *
     * @return  self
     */
    public function setDieta($dieta)
    {
        $this->dieta = $dieta;

        return $this;
    }
}
