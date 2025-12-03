<?php
 if (session_status() == PHP_SESSION_NONE) session_start();

 if (!isset($_SESSION['totalJugadores'])) {
    $_SESSION['totalJugadores'] = 0;
 }
class Liga
{
    protected $equipo;
    protected $estadio;
    protected $numJugadores;

    public function __construct($equipo, $estadio, $numJugadores)
    {
        $this->equipo = $equipo;
        $this->estadio = $estadio;
        $this->numJugadores = $numJugadores;

        // ¿Cuántos jugadores tendrá la liga en total?
        $_SESSION['totalJugadores'] += $this->numJugadores;
    }

    public function getEquipo(){
        return $this->equipo;
    }

    public function getEstadio(){
        return $this->estadio;
    }

    public function getNumJugadores(){
        return $this->numJugadores;
    }

    public static function totalJugadores(){
        return $_SESSION['totalJugadores'];
    }

}
