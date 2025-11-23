<?php
class Factura
{
    private static $iva;
    private $ImporteBase;
    private $fecha;
    private $estado;
    private $productos;


    public function __construct($ImpBase, $fecha, $estado, $productos)
    {
        $this->ImporteBase = $ImpBase;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->productos[] = $productos;
        $this->iva = 1.21;
    }

    public function AñadeProductos(){



    }

    public function ImprimeFactura(){
        
    }

   

    /**
     * Get the value of ImporteBase
     */ 
    public function getImporteBase()
    {
        return $this->ImporteBase;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}
