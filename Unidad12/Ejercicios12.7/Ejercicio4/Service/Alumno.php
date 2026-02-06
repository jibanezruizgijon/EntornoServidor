<?php
require_once 'escuela.php';
require_once 'Asignatura.php';
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

  public function update()
  {
    $conexion = Escuela::connectDB();
    $actualiza = "UPDATE alumno SET nombre='$this->nombre', apellidos='$this->apellidos', curso='$this->curso' WHERE matricula='$this->matricula'";
    $conexion->exec($actualiza);
    $conexion = null;
  }

  public static function getAlumnoById($matricula)
  {
    $conexion = Escuela::connectDB();
    $seleccion = "SELECT * FROM alumno WHERE matricula = '$matricula'";
    $consulta = $conexion->query($seleccion);
    if ($consulta->rowCount() > 0) {
      $registro = $consulta->fetchObject();
      $alumno = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
      $conexion = null;
      return $alumno;
    } else {
      $conexion = null;
      return false;
    }
  }

  public  function getAsignaturaMat()
  {
    $conexion = Escuela::connectDB();
    $seleccion = "SELECT * FROM asignatura JOIN alumno_asignatura ON asignatura.codigo = alumno_asignatura.codigo_asignatura WHERE alumno_asignatura.matricula='$this->matricula'";
    $consulta = $conexion->query($seleccion);
    $asignaturas = [];
    while ($registro = $consulta->fetchObject()) {
      $asignaturas[] = new Asignatura($registro->codigo, $registro->nombre);
    }
    return $asignaturas;
  }

  public static function getAlumnosByCurso($curso)
  {
    $conexion = Escuela::connectDB();
    $seleccion = "SELECT * FROM alumno WHERE curso = '$curso'";
    $consulta = $conexion->query($seleccion);
    $alumnos = [];
    while ($registro = $consulta->fetchObject()) {
      $alumnos[] = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
    }
    $conexion = null;
    return $alumnos;
  }

  // Buscar alumnos cuyo nombre contenga la cadena (filtro parcial)
  public static function getAlumnosFiltroNombre($cadena)
  {
    $conexion = Escuela::connectDB();
    // Usamos LIKE con % para buscar coincidencias parciales
    $seleccion = "SELECT * FROM alumno WHERE nombre LIKE '%$cadena%'";
    $consulta = $conexion->query($seleccion);
    $alumnos = [];
    while ($registro = $consulta->fetchObject()) {
      $alumnos[] = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
    }
    $conexion = null;
    return $alumnos;
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
