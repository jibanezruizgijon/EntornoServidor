<?php
require_once 'FotografiasDB.php';
require_once 'Usuario.php';
require_once 'Foto.php';
class Like {
	private $id_foto;
	private $id_usuario;

	function __construct($id_foto=0, $id_usuario=0) {
		$this->id_foto = $id_foto;
		$this->id_usuario = $id_usuario;	
	}

	public function insert() {
		$conexion = FotografiasDB::connectDB();
		$insercion = "INSERT INTO likes (id_foto, id_usuario) VALUES ($this->id_foto, $this->id_usuario)";
		$conexion->exec($insercion);
	}
	public function delete() {
		$conexion = FotografiasDB::connectDB();
		$borrado = "DELETE FROM likes WHERE id_foto=$this->id_foto AND id_usuario=$this->id_usuario";
		$conexion->exec($borrado);
	}

	 public function likesByFoto()
  {
    $conexion = FotografiasDB::connectDB();
    $seleccion = "SELECT COUNT(*) as total FROM likes WHERE id_foto='$this->id_foto'";
    $consulta = $conexion->query($seleccion);
    $total = $consulta->fetchColumn();
    $conexion = null;
    return $total;
  }
}