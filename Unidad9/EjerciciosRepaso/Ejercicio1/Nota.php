<?php
include_once 'Funciones.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['fechaHora'])) {
    $_SESSION['fechaHora'] = 0;
}

if (!isset($_SESSION['ultima'])) {
    $_SESSION['ultima'] = 'No hay notas reciente';
}

class Nota
{
    protected $titulo;
    protected $texto;
    protected $creacion;

    public function __construct($titulo, $texto)
    {
        $this->titulo = $titulo;
        $this->texto = $texto;
        $this->creacion = creacionFechaHora();
        $_SESSION['ultima'] = $this->titulo;
        $_SESSION['fechaHora'] = $this->creacion;
    }

    // Esta función sirve para rescatar la última nota de UN DETERMINADO USUARIO
    public static function ultimaNotaCreada($user){
        // Compruebo si el usuario tiene alguna nota
        if (isset($_SESSION['notas'][$user])) {
            // Rescato la nota
            $notaUsuario = $_SESSION['notas'][$user];
            // Si no está vacío
            if (!empty($notaUsuario)) {
                // Rescato el último que se haya escrito
                $ultimaNota = unserialize(end($notaUsuario));
                // Y devuelvo solamente el título
                return $ultimaNota->getTitulo();
            }
        }
        return 'No hay notas recientes';
    }

    public function getTitulo(){
        return $this->titulo;
    }
    
    public function getTexto(){
        return $this->texto;
    }
    
    public function getCreacion(){
        return $this->creacion;
    }
    
}
