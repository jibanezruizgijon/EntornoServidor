<?php
class Menu
{
    private $titulo = [];
    private $enlace = [];

    public function __construct($titulo, $enlace)
    {
        $this->titulo[] =  $titulo;
        $this->enlace[] =  $enlace;
    }



    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */
    public function setTitulo($titulo)
    {
        $this->titulo[] += $titulo;

        return $this;
    }

    /**
     * Get the value of enlace
     */
    public function getEnlace()
    {
        return $this->enlace;
    }

    /**
     * Set the value of enlace
     *
     * @return  self
     */
    public function setEnlace($enlace)
    {
        $this->enlace[] += $enlace;

        return $this;
    }

    public function mostrarHorizontal()
    {
        echo "<div>";
        for ($i=0; $i < count($this->titulo) ; $i++) { 
           echo "<a href='" .$this->enlace[$i]. "'>" .$this->titulo[$i]. "</a>";
        }
        echo "</div>";
    }

    public function mostrarVertical() {}
}
