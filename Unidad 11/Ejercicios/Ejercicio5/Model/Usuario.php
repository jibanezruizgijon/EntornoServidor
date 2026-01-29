<?php
require_once 'Carro.php';
require_once 'Usuario.php';
require_once 'Producto.php';
require_once 'Cesta.php';

class Usuario
{
  private $id;
  private $nombre;
  private $pass;
  private $rol;
  function __construct($id = "", $nombre = "", $pass = "", $rol = "")
  {
    $this->id = $id;
    $this->nombre =  $nombre;
    $this->pass = $pass;
    $this->rol = $rol;
  }


  // Para obtener todos los usuarios
  public static function getUsarios()
  {
    $conexion = Carrito::connectDB();
    $seleccion = "SELECT * FROM usuario";
    $consulta = $conexion->query($seleccion);
    $Usuarios = [];
    while ($registro = $consulta->fetchObject()) {
      $Usuarios[] = new Usuario($registro->id, $registro->nombre, $registro->pass, $registro->rol);
    }
    $conexion = null;
    return $Usuarios;
  }

  public function getProductoCesta()
  {
    $conexion = Carrito::connectDB();
    $seleccion = "SELECT * FROM productos JOIN cesta ON cesta.cod_producto = productos.id WHERE cesta.id_cliente='$this->id'";
    $consulta = $conexion->query($seleccion);
    $productos = [];
    while ($registro = $consulta->fetchObject()) {
      $producto = new Producto($registro->id, $registro->nombre, $registro->precio, $registro->imgUrl, $registro->descripcion, $registro->stock);

      $cestaAux = Cesta::getCestaByIdAndCod($this->id, $producto->getId());

      $producto->setCantidad($cestaAux->getCantidad());

      $productos[] = $producto;
    }
    return $productos;
  }

  public function vaciarCesta()
  {
    $conexion = Carrito::connectDB();
    $borrado = "DELETE FROM cesta WHERE id_cliente='$this->id'";
    $conexion->exec($borrado);
    $conexion = null;
  }

  // Para crear usuarios 
  public function insert()
  {
    $conexion = Carrito::connectDB();
    $insercion = "INSERT INTO usuario (id, nombre, pass, rol) VALUES ('$this->id', '$this->nombre','$this->pass','$this->rol')";
    $conexion->exec($insercion);
    $conexion = null;
  }

  // Para borrar usuarios 
  public function delete()
  {
    $conexion = Carrito::connectDB();
    $borrado = "DELETE FROM usuario WHERE id='$this->id'";
    $conexion->exec($borrado);
    $conexion = null;
  }

  public function update()
  {
    $conexion = Carrito::connectDB();
    $actualiza = "UPDATE usuario SET nombre='$this->nombre', apellidos='$this->pass', curso='$this->rol' WHERE id='$this->id'";
    $conexion->exec($actualiza);
    $conexion = null;
  }

  public static function getUsarioById($id)
  {
    $conexion = Carrito::connectDB();
    $seleccion = "SELECT * FROM usuario WHERE id = '$id'";
    $consulta = $conexion->query($seleccion);
    if ($consulta->rowCount() > 0) {
      $registro = $consulta->fetchObject();
      $usuario = new Usuario($registro->id, $registro->nombre, $registro->pass, $registro->rol);
      $conexion = null;
      return $usuario;
    } else {
      $conexion = null;
      return false;
    }
  }

  public static function getUsarioByPass($pass)
  {
    $conexion = Carrito::connectDB();
    $seleccion = "SELECT * FROM usuario WHERE pass = '$pass'";
    $consulta = $conexion->query($seleccion);
    if ($consulta->rowCount() > 0) {
      $registro = $consulta->fetchObject();
      $usuario = new Usuario($registro->id, $registro->nombre, $registro->pass, $registro->rol);
      $conexion = null;
      return $usuario;
    } else {
      $conexion = null;
      return false;
    }
  }

  public function cantidadEnCesta()
  {
    $conexion = Carrito::connectDB();
    $seleccion = "SELECT SUM(cantidad) FROM cesta WHERE id_cliente ='$this->id'";
    $consulta = $conexion->query($seleccion);
    $numero = $consulta->fetchColumn();
    if ($numero) {
      return $numero;
    } else {
      return 0;
    }
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

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  public function getRol()
  {
    return $this->rol;
  }

  public function setRol($rol)
  {
    $this->rol = $rol;

    return $this;
  }
}
