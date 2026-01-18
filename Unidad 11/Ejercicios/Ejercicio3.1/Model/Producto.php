<?php
require_once 'Almacen.php';

class Producto
{
  private $codigo;
  private $nombre;
  private $precio;
  private $stock;
  

  function __construct($codigo = "",$nombre = "", $precio= "",$stock = "")
  {
    $this->codigo = $codigo;
    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->stock = $stock;
  }

  // Para obtener todos los productos
  public static function getProductos()
  {
    $conexion = Almacen::connectDB();
    $seleccion = "SELECT * FROM productos";
    $consulta = $conexion->query($seleccion);
    $Productos = [];
    while ($registro = $consulta->fetchObject()) {
      $Productos[] = new Producto($registro->codigo, $registro->nombre, $registro->precio, $registro->stock);
    }
    $conexion = null;
    return $Productos;
  }

  // Para crear productos 
  public function insert()
  {
    $conexion = Almacen::connectDB();
    $insercion = "INSERT INTO productos_1 (nombre, precio, imgUrl, descripcion) VALUES ('$this->nombre','$this->precio','$this->imgUrl','$this->descripcion')";
    $conexion->exec($insercion);
    $conexion = null;
  }

  // Para reponer productos 
  public function reponer()
  {
    $conexion = Almacen::connectDB();
    $reponer = "UPDATE productos_1 SET stock='$this->stock'";
    $conexion->exec($reponer);
    $conexion = null;
  }

  // Para vender productos 
  public function vender()
  {
    $conexion = Almacen::connectDB();
    $reponer = "UPDATE productos_1 SET stock='$this->stock'";
    $conexion->exec($reponer);
    $conexion = null;
  }

  

  // Para borrar productos 
  public function delete()
  {
    $conexion = Almacen::connectDB();
    $borrado = "DELETE FROM productos_1 WHERE codigo='$this->codigo'";
    $conexion->exec($borrado);
    $conexion = null;
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

  public function getCodigo()
  {
    return $this->codigo;
  }

  public function setCodigo($codigo)
  {
    $this->codigo = $codigo;

    return $this;
  }

  public function getStock()
  {
    return $this->stock;
  }

  public function setStock($stock)
  {
    $this->stock = $stock;

    return $this;
  }
}
