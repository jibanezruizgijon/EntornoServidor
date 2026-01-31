<?php
require_once 'Carro.php';

class Producto
{
  private $id;
  private $nombre;
  private $precio;
  private $imgUrl;
  private $descripcion;
  private $stock;
  private $cantidad;

  function __construct($id = "",$nombre = "", $precio= "",$imgUrl = "", $descripcion = "", $stock = "")
  {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->imgUrl = $imgUrl;
    $this->descripcion = $descripcion;
    $this->stock = $stock;
  }

  // Para obtener todos los productos
  public static function getProductos()
  {
    $conexion = Carrito::connectDB();
    $seleccion = "SELECT * FROM productos";
    $consulta = $conexion->query($seleccion);
    $Productos = [];
    while ($registro = $consulta->fetchObject()) {
      $Productos[] = new Producto($registro->id, $registro->nombre, $registro->precio, $registro->imgUrl, $registro->descripcion, $registro->stock);
    }
    $conexion = null;
    return $Productos;
  }

   public static function getProductoById($id)
  {
    $conexion = Carrito::connectDB();
    $seleccion = "SELECT * FROM productos WHERE id=$id";
    $consulta = $conexion->query($seleccion);
    if ($consulta->rowCount() > 0) {
      $registro = $consulta->fetchObject();
      $producto = new Producto($registro->id, $registro->nombre, $registro->precio, $registro->imgUrl, $registro->descripcion, $registro->stock);
      $conexion = null;
      return $producto;
    } else {
      $conexion = null;
      return false;
    }
  }


   // Para reponer productos 
  public function reponer()
  {
    $conexion = Carrito::connectDB();
    $reponer = "UPDATE productos SET stock='$this->stock' WHERE id='$this->id'";
    $conexion->exec($reponer);
    $conexion = null;
  }

  // Para crear productos 
  public function insert()
  {
    $conexion = Carrito::connectDB();
    $insercion = "INSERT INTO productos (nombre, precio, imgUrl, descripcion, stock) VALUES ('$this->nombre','$this->precio','$this->imgUrl','$this->descripcion','$this->stock')";
    $conexion->exec($insercion);
    $conexion = null;
  }

  // Para borrar productos 
  public function delete()
  {
    $conexion = Carrito::connectDB();
    $borrado = "DELETE FROM productos WHERE id='$this->id'";
    $conexion->exec($borrado);
    $conexion = null;
  }
 
  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;

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

  public function getDescripcion()
  {
    return $this->descripcion;
  }

  public function setDescripcion($descripcion)
  {
    $this->descripcion = $descripcion;

    return $this;
  }

  public function getImgUrl()
  {
    return $this->imgUrl;
  }


  public function setImgUrl($imgUrl)
  {
    $this->imgUrl = $imgUrl;

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

 
  public function getCantidad()
  {
    return $this->cantidad;
  }


  public function setCantidad($cantidad)
  {
    $this->cantidad = $cantidad;

    return $this;
  }
}
