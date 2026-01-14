<?php
require_once 'escuela.php';

class Alumno
{
  private $matricula;
  private $nombre;
  private $apellidos;
  private $curso;
  function __construct($matricula = "", $nombre = "", $apellidos = "", $curso = "")
  {
    $this->matricula = $matricula;
    $this->nombre =  $nombre;
    $this->apellidos = $apellidos;
    $this->curso = $curso;
  }


  // Para obtener todos los alumnos
  public static function getAlumnos()
  {
    $conexion = Escuela::connectDB();
    $seleccion = "SELECT * FROM alumno";
    $consulta = $conexion->query($seleccion);
    $Alumnos = [];
    while ($registro = $consulta->fetchObject()) {
      $Alumnos[] = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
    }
    $conexion = null;
    return $Alumnos;
  }

  // Para crear Alumnos 
  public function insert()
  {
    $conexion = Escuela::connectDB();
    $insercion = "INSERT INTO alumno (matricula, nombre, apellidos, curso) VALUES ('$this->matricula', '$this->nombre','$this->apellidos','$this->curso')";
    $conexion->exec($insercion);
    $conexion = null;
  }

  // Para borrar artículos 
  public function delete()
  {
    $conexion = Escuela::connectDB();
    $borrado = "DELETE FROM alumno WHERE matricula='$this->matricula'";
    $conexion->exec($borrado);
    $conexion = null;
  }


  public function getMatricula()
  {
    return $this->matricula;
  }

  public function setMatricula($matricula)
  {
    $this->matricula = $matricula;

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

  public function getApellidos()
  {
    return $this->apellidos;
  }

  public function setApellidos($apellidos)
  {
    $this->apellidos = $apellidos;

    return $this;
  }

  public function getCurso()
  {
    return $this->curso;
  }

  public function setCurso($curso)
  {
    $this->curso = $curso;

    return $this;
  }
}
