<?php
require_once 'LogisticaDB.php';
require_once 'Ciudad.php';
class Transporte
{
	private $id;
	private $origen;
	private $destino;
	private $fecha;
	private $empresa;

	function __construct($id = 0, $origen = '', $destino = '', $fecha = '', $empresa = '')
	{
		$this->id = $id;
		$this->origen = $origen;
		$this->destino = $destino;
		$this->fecha = $fecha;
		$this->empresa = $empresa;
	}

	public function insert()
	{
		$conexion = LogisticaDB::connectDB();
		$insercion = "INSERT INTO transporte (origen, destino, fecha, empresa) VALUES ($this->origen, $this->destino, '$this->fecha', '$this->empresa')";
		$conexion->exec($insercion);
	}
	public function delete()
	{
		$conexion = LogisticaDB::connectDB();
		$borrado = "DELETE FROM transporte WHERE id=$this->id";
		$conexion->exec($borrado);
	}
	public function update()
	{
		$conexion = LogisticaDB::connectDB();
		$actualiza = "UPDATE transporte SET origen=$this->origen, destino=$this->destino, fecha='$this->fecha', empresa='$this->empresa' WHERE id=$this->id";
		$conexion->exec($actualiza);
	}
	public static function getTransportes()
	{
		$conexion = LogisticaDB::connectDB();
		$seleccion = "SELECT * FROM transporte ORDER BY fecha DESC";
		$consulta = $conexion->query($seleccion);
		$transportes = [];
		while ($registro = $consulta->fetchObject()) {
			$transportes[] = new Transporte($registro->id, $registro->origen, $registro->destino, $registro->fecha, $registro->empresa);
		}
		return $transportes;
	}

	public static function filtrarTransporte($origen = "", $destino = "", $empresa = "", $fecha = "")
	{
		$conexion = LogisticaDB::connectDB();
		$seleccion = "SELECT * FROM transporte  WHERE origen LIKE '%$origen%' AND destino LIKE '%$destino%' AND empresa LIKE '%$empresa%' AND fecha LIKE '%$fecha%'";
		$consulta = $conexion->query($seleccion);
		$transportes = [];
		while ($registro = $consulta->fetchObject()) {
			$transportes[] = new Transporte($registro->id, $registro->origen, $registro->destino, $registro->fecha, $registro->empresa);
		}
		return $transportes;
	}
	public static function getTransporteById($id)
	{
		$conexion = LogisticaDB::connectDB();
		$seleccion = "SELECT * FROM transporte WHERE id=$id";
		$consulta = $conexion->query($seleccion);
		if ($registro = $consulta->fetchObject()) {
			return new Transporte($registro->id, $registro->origen, $registro->destino, $registro->fecha, $registro->empresa);
		} else {
			return false;
		}
	}

	public static function comprobarTransporteExistente($idOrigen, $idDestino, $fecha)
	{
		$conexion = LogisticaDB::connectDB();
		$seleccion = "SELECT * FROM transporte WHERE origen='$idOrigen' AND  destino='$idDestino' AND fecha='$fecha'";
		$consulta = $conexion->query($seleccion);
		if ($consulta->rowCount() > 0) {
			$conexion = null;
			return true;
		} else {
			$conexion = null;
			return false;
		}
	}

	// public static function comprobarTransportebyOrigen($idOrigen)
	// {
	// 	$conexion = LogisticaDB::connectDB();
	// 	$seleccion = "SELECT * FROM transporte WHERE origen='$idOrigen'";
	// 	$consulta = $conexion->query($seleccion);
	// 	if ($consulta->rowCount() > 0) {
	// 		$conexion = null;
	// 		return true;
	// 	} else {
	// 		$conexion = null;
	// 		return false;
	// 	}
	// }

	// public static function comprobarTransportebyDestino($idDestino)
	// {
	// 	$conexion = LogisticaDB::connectDB();
	// 	$seleccion = "SELECT * FROM transporte WHERE destino='$idDestino'";
	// 	$consulta = $conexion->query($seleccion);
	// 	if ($consulta->rowCount() > 0) {
	// 		$conexion = null;
	// 		return true;
	// 	} else {
	// 		$conexion = null;
	// 		return false;
	// 	}
	// }

	// Remplaza comprobarTransportebyDestino y comprobarTransportebyOrigen
	public static function comprobarTransporte($id)
	{
		$conexion = LogisticaDB::connectDB();
		$seleccion = "SELECT * FROM transporte WHERE origen='$id' OR destino='$id'";
		$consulta = $conexion->query($seleccion);
		if ($consulta->rowCount() > 0) {
			$conexion = null;
			return true;
		} else {
			$conexion = null;
			return false;
		}
	}

	public static function filtrarTransporteByFecha($fechaInicio, $fechaFin)
	{
		$conexion = LogisticaDB::connectDB();
		$seleccion = "SELECT * FROM transporte  WHERE fecha > '$fechaInicio' AND fecha < '$fechaFin' ";
		$consulta = $conexion->query($seleccion);
		$transportes = [];
		while ($registro = $consulta->fetchObject()) {
			$transportes[] = new Transporte($registro->id, $registro->origen, $registro->destino, $registro->fecha, $registro->empresa);
		}
		return $transportes;
	}

	

	public function getId()
	{
		return $this->id;
	}
	public function getOrigen()
	{
		return $this->origen;
	}
	public function getDestino()
	{
		return $this->destino;
	}
	public function getFecha()
	{
		return $this->fecha;
	}
	public function getEmpresa()
	{
		return $this->empresa;
	}
	public function setOrigen($origen)
	{
		$this->origen = $origen;
	}
	public function setDestino($destino)
	{
		$this->destino = $destino;
	}
	public function setFecha($fecha)
	{
		$this->fecha = $fecha;
	}
	public function setEmpresa($empresa)
	{
		$this->empresa = $empresa;
	}
}
