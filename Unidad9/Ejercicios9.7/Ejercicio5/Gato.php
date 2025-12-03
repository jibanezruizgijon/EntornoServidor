<?php
include_once 'Mamifero.php';

class Gato extends Mamifero
{
    private $raza;

    public function __construct($s, $ed, $pe, $di, $r)
    {
        parent::__construct($s, $ed, $pe, $di);
        $this->raza = $r;
    }

    public function __toString()
    {
        return parent:: __toString(). ",raza: $this->raza";
    }

    public function maulla()
    {
        return "miauuuu<br>";
    }

    public function comer($comida)
    {
        if ($comida != "pescado") {
            return "Solo como pescado<br>";
        } else {
            return "Que buenoo<br>";
        }
    }

    /**
     * Get the value of raza
     */
    public function getRaza()
    {
        return $this->raza;
    }

    /**
     * Set the value of raza
     *
     * @return  self
     */
    public function setRaza($raza)
    {
        $this->raza = $raza;

        return $this;
    }
}
