<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['listaIngredientes'])) {
  $_SESSION['listaIngredientes'] = [];
}

class Receta
{
  private $codigo;
  private $nombre;
  private $tipo;
  private $ingredientes;


  function __construct($nom, $tip)
  {
    $this->tipo = $tip;
    $this->nombre = $nom;
    $this->codigo = time() . "-" . strtoupper(substr($this->nombre, -3));
    $this->ingredientes = [];
  }

  // Los ingredientes se añaden de uno en uno ya que no se sabe la cantidad 
  public function añadirIngredientes($ingred)
  {
    $this->ingredientes[] = $ingred;

    $arrayIngredientes =  $_SESSION['listaIngredientes'];
    if (array_search($ingred, $arrayIngredientes) == null) {
      $_SESSION['listaIngredientes'][] = $ingred;
    }
  }

  public static function getListaIngredientes()
  {
    return $_SESSION['listaIngredientes'];
  }

  /**
   * Get the value of codigo
   */
  public function getCodigo()
  {
    return $this->codigo;
  }

  /**
   * Set the value of codigo
   *
   * @return  self
   */
  public function setCodigo($codigo)
  {
    $this->codigo = $codigo;

    return $this;
  }

  /**
   * Get the value of nombre
   */
  public function getNombre()
  {
    return $this->nombre;
  }

  /**
   * Set the value of nombre
   *
   * @return  self
   */
  public function setNombre($nombre)
  {
    $this->nombre = $nombre;

    return $this;
  }

  /**
   * Get the value of tipo
   */
  public function getTipo()
  {
    return $this->tipo;
  }

  /**
   * Set the value of tipo
   *
   * @return  self
   */
  public function setTipo($tipo)
  {
    $this->tipo = $tipo;

    return $this;
  }



  public function getMostrarIngredientes()
  {
    $ingredienteMostrar = "";
    foreach ($this->ingredientes as $ingredientes => $ingrediente) {
      $ingredienteMostrar .= "- " . $ingrediente . "<br>";
    }

    return $ingredienteMostrar;
  }

  /**
   * Get the value of ingredientes
   */
  public function getIngredientes()
  {
    $ingredienteMostrar = "";
    foreach ($this->ingredientes as $ingredientes => $ingrediente) {
      $ingredienteMostrar .=  $ingrediente ."," ;
    }

    return $ingredienteMostrar;
  }

  /**
   * Set the value of ingredientes
   *
   * @return  self
   */
  public function setIngredientes($ingredientes)
  {
    $this->ingredientes = $ingredientes;

    return $this;
  }
}
