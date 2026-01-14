<?php
require_once 'Carro.php';

class Producto
{
  private $codigo;
  private $nombre;
  private $precio;
  private $stock;

  function __construct($codigo = "",$nombre = "", $precio= "", $stock = "")
  {
    $this->codigo = $codigo;
    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->stock = $stock;
  }


  public function getStock()
  {
    return $this->stock;
  }

  public function setContenido($stock)
  {
    $this->stock = $stock;

    return $this;
  }

  // Para obtener todos los productos
  public static function getProductos()
  {
    $conexion = Carrito::connectDB();
    $seleccion = "SELECT * FROM productos";
    $consulta = $conexion->query($seleccion);
    $Articulos = [];
    while ($registro = $consulta->fetchObject()) {
      $Productos[] = new Producto($registro->codigo, $registro->nombre, $registro->precio, $registro->stock);
    }
    $conexion = null;
    return $Articulos;
  }

  // Para crear productos 
  public function insert()
  {
    $conexion = Carrito::connectDB();
    $insercion = "INSERT INTO productos (nombre, precio, stock) VALUES ('$this->codigo', '$this->nombre','$this->precio','$this->stock')";
    $conexion->exec($insercion);
    $conexion = null;
  }

  // Para borrar productos 
  public function delete()
  {
    $conexion = Carrito::connectDB();
    $borrado = "DELETE FROM productos WHERE codigo='$this->codigo'";
    $conexion->exec($borrado);
    $conexion = null;
  }
 
  public function getCodigo()
  {
    return $this->codigo;
  }

  public function setCodigo($codigo)
  {
    $this->codigo = $codigo;

    return $this;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;

    return $this;
  }

  public function getPrecio()
  {
    return $this->precio;
  }

  public function setPrecio($precio)
  {
    $this->precio = $precio;

    return $this;
  }
}
