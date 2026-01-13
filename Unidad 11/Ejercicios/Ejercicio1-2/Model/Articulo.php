<?php
require_once 'BlogDB.php';

class Articulo
{
  private $id;
  private $titulo;
  private $fecha;
  private $contenido;
  function __construct($id = "",$titulo = "", $fecha= "", $contenido = "")
  {
    $this->id = $id;
    $this->titulo = $titulo;
    $this->fecha = $fecha ? $fecha : date('Y-m-d H:i:s');
    $this->contenido = $contenido;
  }

  public function getId()
  {
    return $this->id;
  }
  public function getTitulo()
  {
    return $this->titulo;
  }

  public function setTitulo($titulo)
  {
    $this->titulo = $titulo;

    return $this;
  }

  public function getFecha()
  {
    return $this->fecha;
  }

  public function getContenido()
  {
    return $this->contenido;
  }

  public function setContenido($contenido)
  {
    $this->contenido = $contenido;

    return $this;
  }

  // Para obtener todos los artículos
  public static function getArticulos()
  {
    $conexion = BlogDB::connectDB();
    $seleccion = "SELECT * FROM articulo";
    $consulta = $conexion->query($seleccion);
    $Articulos = [];
    while ($registro = $consulta->fetchObject()) {
      $Articulos[] = new Articulo($registro->id, $registro->titulo,$registro->fecha, $registro->contenido);
    }
    $conexion = null;
    return $Articulos;
  }

  // Para crear artículos 
  public function insert()
  {
    $conexion = BlogDB::connectDB();
    $insercion = "INSERT INTO articulo (titulo, fecha, contenido) VALUES ('$this->titulo', '$this->fecha','$this->contenido')";
    $conexion->exec($insercion);
    $conexion = null;
  }

  // Para borrar artículos 
  public function delete()
  {
    $conexion = BlogDB::connectDB();
    $borrado = "DELETE FROM articulo WHERE id='$this->id'";
    $conexion->exec($borrado);
    $conexion = null;
  }
}
