<?php
class Factura
{
    private static $iva = 0.21;
    private $ImporteBase;
    private $fecha;
    private $estado;
    private $productos;


    public function __construct($fecha, $estado)
    {
        $this->ImporteBase = 0;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->productos = [];
    }

    public function AñadeProducto($nombre, $precio, $cantidad)
    {
        $precio = (double)$precio;
        $cantidad = (int)$cantidad;
        $this->productos[] = [$nombre, $precio, $cantidad];
        $this->ImporteBase += $precio * $cantidad;
    }

    public function ImprimeFactura()
    {
        $suma = 0;
        $factura = "<div>";
        $factura .= "<h2>Estado: " . $this->estado . "</h2>";
        $factura .= "<h2>Fecha: " . $this->fecha . "</h2>";
        $factura .= "<table>";
        $factura .= "<tr><th>Nombre</th><th>Precio</th><th>Cantidad</th></tr>";
        foreach ($this->productos as $datos) {
            $factura .= "<tr>";
            $factura .= "<td>" . $datos[0] . "</td>";
            $factura .= "<td>" . $datos[1] . "</td>";
            $factura .= "<td>" . $datos[2] . "</td>";
            $factura .= "</tr>";
            $suma += $datos[1] * $datos[2];
        }
        $factura .= "<tr><td colspan='2'>Subtotal</td><td>$suma</td></tr>";
        $factura .= "<tr><td colspan='2'>IVA 21%</td><td>" . ($suma * Factura::getIva()) . "</td></tr>";
        $factura .= "<tr><td colspan='2'>TOTAL</td><td>" . ($suma * (1+Factura::getIva())) . "</td></tr>";
        $factura .= "</table>";
        return $factura;
    }


    public static function getIva()
    {
        return Factura::$iva;
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
