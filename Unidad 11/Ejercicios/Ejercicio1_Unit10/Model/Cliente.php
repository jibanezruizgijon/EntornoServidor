<?php
require_once 'BancoDB.php';
class Cliente
{
    private $id;
    private $dni;
    private $nombre;
    private $direccion;
    private $telefono;
    function __construct($id = "", $dni = "", $nombre = "", $direccion = "", $telefono = "")
    {
        $this->id = $id;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
    }

    public function insert()
    {
        $conexion = BancoDB::connectDB();
        $insercion = "INSERT INTO cliente (dni, nombre, direccion, telefono) VALUES ('$this->dni', '$this->nombre','$this->direccion','$this->telefono')";
        $conexion->exec($insercion);
        $conexion = null;
    }
    public function delete()
    {
        $conexion = BancoDB::connectDB();
        $borrado = "DELETE FROM cliente WHERE id='$this->id'";
        $conexion->exec($borrado);
        $conexion = null;
    }
    public function update()
    {
        $conexion = BancoDB::connectDB();
        $actualiza = "UPDATE cliente SET dni='$this->dni', nombre='$this->nombre', direccion='$this->direccion', telefono='$this->telefono' WHERE id='$this->id'";
        $conexion->exec($actualiza);
        $conexion = null;
    }
    public static function getClientes()
    {
        $conexion = BancoDB::connectDB();
        $seleccion = "SELECT * FROM cliente";
        $consulta = $conexion->query($seleccion);
        $clientes = [];
        while ($registro = $consulta->fetchObject()) {
            $clientes[] = new Cliente($registro->id, $registro->dni, $registro->nombre, $registro->direccion, $registro->telefono);
        }
        $conexion = null;
        return $clientes;
    }
    public static function getClienteById($id)
    {
        $conexion = BancoDB::connectDB();
        $seleccion = "SELECT id, dni, nombre, direccion, telefono FROM cliente WHERE id=$id";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount() > 0) {
            $registro = $consulta->fetchObject();
            $cliente = new Cliente($registro->id, $registro->nombre, $registro->direccion, $registro->telefono);
            $conexion = null;
            return $cliente;
        } else {
            $conexion = null;
            return false;
        }
    }

    public function getId()
    {
        return $this->id;
    }
    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;

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

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }
}
