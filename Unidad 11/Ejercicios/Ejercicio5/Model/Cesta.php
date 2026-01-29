<?php
require_once 'Carro.php';

class Cesta
{
  private $id_cliente;
  private $cod_producto;
  private $cantidad;


  function __construct($id_cliente = "",$cod_producto = "", $cantidad= "")
  {
    $this->id_cliente = $id_cliente;
    $this->cod_producto = $cod_producto;
    $this->cantidad = $cantidad;
  }

  // Para obtener todos los productos de un cliente
  public static function getCestaById_cliente($id)
  {
    $conexion = Carrito::connectDB();
    $seleccion = "SELECT * FROM cesta WHERE id_cliente=''";
    $consulta = $conexion->query($seleccion);
    $Productos = [];
    while ($registro = $consulta->fetchObject()) {
      $Productos[] = new Producto($registro->id, $registro->nombre, $registro->precio, $registro->imgUrl, $registro->descripcion, $registro->stock);
    }
    $conexion = null;
    return $Productos;
  }

   public static function getProductoById($id_cliente, $cod_producto)
  {
    $conexion = Carrito::connectDB();
    $seleccion = "SELECT * FROM cesta WHERE id_cliente='$id_cliente' AND cod_producto='$cod_producto'";
    $consulta = $conexion->query($seleccion);
    if ($consulta->rowCount() > 0) {
      $conexion = null;
      return true;
    } else {
      $conexion = null;
      return false;
    }
  }

    public static function getCestaByIdAndCod($id_cliente, $cod_producto)
  {
    $conexion = Carrito::connectDB();
    $seleccion = "SELECT * FROM cesta WHERE id_cliente = '$id_cliente' AND cod_producto = '$cod_producto'";
    $consulta = $conexion->query($seleccion);
    if ($consulta->rowCount() > 0) {
      $registro = $consulta->fetchObject();
      $cesta = new Cesta($registro->id_cliente, $registro->cod_producto, $registro->cantidad);
      $conexion = null;
      return $cesta;
    } else {
      $conexion = null;
      return false;
    }
  }


   // Para reponer
  public function añadir()
  {
    $conexion = Carrito::connectDB();
    $reponer = "UPDATE cesta SET cantidad='$this->cantidad' WHERE id_cliente='$this->id_cliente' AND cod_producto='$this->cod_producto'";
    $conexion->exec($reponer);
    $conexion = null;
  }

  // Para crear productos 
  public function insert()
  {
    $conexion = Carrito::connectDB();
    $insercion = "INSERT INTO cesta (id_cliente, cod_producto, cantidad) VALUES ('$this->id_cliente','$this->cod_producto','$this->cantidad')";
    $conexion->exec($insercion);
    $conexion = null;
  }

  // Para borrar productos 
  public function delete()
  {
    $conexion = Carrito::connectDB();
    $borrado = "DELETE FROM cesta WHERE id_cliente='$this->id_cliente' AND cod_producto='$this->cod_producto'";
    $conexion->exec($borrado);
    $conexion = null;
  }

  // Para borrar productos 
  public function reducir()
  {
    $conexion = Carrito::connectDB();
    $borrado = "UPDATE cesta SET cantidad='$this->cantidad' WHERE id_cliente='$this->id_cliente' AND cod_producto='$this->cod_producto'";
    $conexion->exec($borrado);
    $conexion = null;
  }

 

  public function getId_cliente()
  {
    return $this->id_cliente;
  }


  public function setId_cliente($id_cliente)
  {
    $this->id_cliente = $id_cliente;

    return $this;
  }


  public function getCod_producto()
  {
    return $this->cod_producto;
  }

  public function setCod_producto($cod_producto)
  {
    $this->cod_producto = $cod_producto;

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
