<?php
require_once 'escuela.php';
require_once 'Asignatura.php';
require_once 'Alumno.php';

class Alumno_Asignatura
{
  private $matricula;
  private $codigo_asignatura;

  function __construct($matricula = "", $codigo_asignatura = "")
  {
    $this->matricula = $matricula;
    $this->codigo_asignatura = $codigo_asignatura;
  }

  public static function getAsignaturas()
  {
    $conexion = Escuela::connectDB();
    $seleccion = "SELECT * FROM alumno_asignatura";
    $consulta = $conexion->query($seleccion);
    $Asignaturas = [];
    while ($registro = $consulta->fetchObject()) {
      $Asignaturas[] = new Alumno_Asignatura($registro->matricula, $registro->codigo_asignatura);
    }
    $conexion = null;
    return $Asignaturas;
  }

  public static function getAsignaturasLibres($matricula)
  {
    $conexion = Escuela::connectDB();
    $seleccion = "SELECT * FROM asignatura WHERE codigo NOT IN  (SELECT codigo_asignatura FROM alumno_asignatura WHERE matricula='$matricula')";
    $consulta = $conexion->query($seleccion);
    $Asignaturas = [];
    while ($registro = $consulta->fetchObject()) {
      $Asignaturas[] = new Asignatura($registro->codigo, $registro->nombre);
    }
    $conexion = null;
    return $Asignaturas;
  }

  public static function getAlumnosMatriculados($codigo_asignatura)
  {
    $conexion = Escuela::connectDB();
    $seleccion = "SELECT * FROM alumno WHERE matricula IN  (SELECT matricula FROM alumno_asignatura WHERE codigo_asignatura='$codigo_asignatura')";
    $consulta = $conexion->query($seleccion);
    $Alumnos = [];
    while ($registro = $consulta->fetchObject()) {
      $Alumnos[] = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
    }
    $conexion = null;
    return $Alumnos;
  }

  public function insert()
  {
    $conexion = Escuela::connectDB();
    $insercion = "INSERT INTO alumno_asignatura (matricula, codigo_asignatura) VALUES ('$this->matricula', '$this->codigo_asignatura')";
    $conexion->exec($insercion);
    $conexion = null;
  }


  public function delete()
  {
    $conexion = Escuela::connectDB();
    $borrado = "DELETE FROM alumno_asignatura WHERE matricula='$this->matricula' AND codigo_asignatura='$this->codigo_asignatura'";
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

  public function getCodigo_asignatura()
  {
    return $this->codigo_asignatura;
  }

  public function setCodigo_asignatura($codigo_asignatura)
  {
    $this->codigo_asignatura = $codigo_asignatura;

    return $this;
  }
}
