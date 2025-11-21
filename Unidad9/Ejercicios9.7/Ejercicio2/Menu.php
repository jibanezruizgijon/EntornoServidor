<?php
class Menu
{
    private $nombre;
    private $titulo;
    private $enlace;

    public function __construct($nombre)
    {
        $this->titulo = [];
        $this->enlace = [];
        $this->nombre = $nombre;
    }


    function añadirElemento($titulo, $enlace){
        $this->titulo[]=$titulo;
        $this->enlace[]=$enlace;
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
        $this->titulo = $titulo;

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
        $this->enlace = $enlace;

        return $this;
    }

    public function mostrarHorizontal()
    {
        $menu =  "<div>";
        for ($i = 0; $i < count($this->titulo); $i++) {
            $menu .= "-<a href='" . $this->enlace[$i] . "'>" . $this->titulo[$i] . "</a>- ";
        }
        return $menu . "</div>";
    }

    public function mostrarVertical() {
        $menu =  "<div>";
        for ($i = 0; $i < count($this->titulo); $i++) {
            $menu .= "<a href='" . $this->enlace[$i] . "'>" . $this->titulo[$i] . "</a><br>";
        }
        return $menu . "</div>";

    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
}
