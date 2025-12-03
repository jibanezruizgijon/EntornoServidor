<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['ultima'])) {
    $_SESSION['ultima'] = "";
}

if (!isset($_SESSION['fecha'])) {
    $_SESSION['fecha'] = "";
}

class Nota
{
    private $titulo;
    private $texto;
    private $creacion;

    public function __construct($titu, $text)
    {
        $this->titulo = $titu;
        $this->texto = $text;
        $this->creacion = date("d/m/Y-G:i:s", time());
        $_SESSION['ultima'] = $titu;
        $_SESSION['fecha'] = date("d/m/Y-G:i:s", time());

    }

    public static function getUltima()
    {
        return $_SESSION['ultima'];
    }

    public static function getFecha()
    {
        return $_SESSION['fecha'];
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
     * Get the value of texto
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get the value of creacion
     */ 
    public function getCreacion()
    {
        return $this->creacion;
    }

    /**
     * Set the value of creacion
     *
     * @return  self
     */ 
    public function setCreacion($creacion)
    {
        $this->creacion = $creacion;

        return $this;
    }
}


// $fechaHoy =  date("d-m-Y", time());