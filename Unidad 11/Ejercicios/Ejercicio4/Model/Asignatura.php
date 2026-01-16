<?php
require_once 'escuela.php';

class Asignatura
{
  private $codigo;
  private $nombre;
 
  function __construct($codigo = "", $nombre = "")
  {
    $this->codigo = $codigo;
    $this->nombre = $nombre;
  }

  public static function getAsignaturas()
  {
    $conexion = Escuela::connectDB();
    $seleccion = "SELECT * FROM asignatura";
    $consulta = $conexion->query($seleccion);
    $Asignaturas = [];
    while ($registro = $consulta->fetchObject()) {
      $Asignaturas[] = new Asignatura($registro->codigo, $registro->nombre);
    }
    $conexion = null;
    return $Asignaturas;
  }

  // Para crear Alumnos 
  public function insert()
  {
    $conexion = Escuela::connectDB();
    $insercion = "INSERT INTO asignatura (codigo, nombre) VALUES ('$this->codigo', '$this->nombre')";
    $conexion->exec($insercion);
    $conexion = null;
  }

  // Para borrar artículos 
  public function delete()
  {
    $conexion = Escuela::connectDB();
    $borrado = "DELETE FROM asignatura WHERE codigo='$this->codigo'";
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

}
