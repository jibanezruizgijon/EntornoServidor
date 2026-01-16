<?php
require_once 'Carro.php';

class Producto
{
  private $id;
  private $nombre;
  private $precio;
  private $imgUrl;
  private $descripcion;

  function __construct($id = "",$nombre = "", $precio= "",$imgUrl = "", $descripcion = "")
  {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->imgUrl = $imgUrl;
    $this->descripcion = $descripcion;
  }




  // Para obtener todos los productos
  public static function getProductos()
  {
    $conexion = Carrito::connectDB();
    $seleccion = "SELECT * FROM productos";
    $consulta = $conexion->query($seleccion);
    $Productos = [];
    while ($registro = $consulta->fetchObject()) {
      $Productos[] = new Producto($registro->id, $registro->nombre, $registro->precio, $registro->imgUrl, $registro->descripcion);
    }
    $conexion = null;
    return $Productos;
  }

  // Para crear productos 
  public function insert()
  {
    $conexion = Carrito::connectDB();
    $insercion = "INSERT INTO productos (nombre, precio, imgUrl, descripcion) VALUES ('$this->nombre','$this->precio','$this->imgUrl','$this->descripcion')";
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
}
