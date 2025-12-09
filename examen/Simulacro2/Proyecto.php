<?php
if (session_status() == PHP_SESSION_NONE) session_start();

class Proyecto
{
    private $codigo;        // Nuevo: Para guardar "ME-57-tos"
    private $descripcion;
    private $prioridad;     // Urgencia (Baja, Media, Alta, Critica)
    private $desarrolladores = []; // Nuevo: Es un array para guardar varios nombres

    // El constructor recibe la descripción, la urgencia y el ARRAY de desarrolladores
    public function __construct($desc, $pri, $devs) {
        $this->descripcion = $desc;
        $this->prioridad = $pri;
        // Filtramos para quitar espacios vacíos si algún input se dejó en blanco
        $this->desarrolladores = array_filter($devs); 
        
        // Generamos el código automáticamente al crear el objeto
        $this->generarCodigo();
    }

    /**
     * Esta función privada crea el código basándose en el patrón de la imagen:
     * Ejemplo: CR-70-ion
     * CR = 2 primeras letras de la prioridad (Mayúsculas)
     * 70 = Número aleatorio
     * ion = 3 últimas letras de la descripción
     */
    private function generarCodigo() {
        // 1. Dos primeras letras de la prioridad en mayúsculas
        $parte1 = strtoupper(substr($this->prioridad, 0, 2));
        
        // 2. Número aleatorio (puedes ajustar el rango)
        $parte2 = strlen($this->descripcion);
        
        // 3. Tres últimas letras de la descripción
        $parte3 = substr($this->descripcion, -3);

        $this->codigo = "$parte1-$parte2-$parte3";
    }

    // --- GETTERS Y SETTERS ---

    public function getCodigo() {
        return $this->codigo;
    }

    public function getDesarrolladores() {
        return $this->desarrolladores;
    }

    // Este getter nos devuelve los desarrolladores separados por comas (útil para imprimir)
    public function getDesarrolladoresString() {
        return implode(", ", $this->desarrolladores);
    }

    public function getPrioridad() {
        return $this->prioridad;
    }

    public function setPrioridad($prioridad) {
        $this->prioridad = $prioridad;
        // Si cambia la prioridad, quizás deberíamos regenerar el código, 
        // pero normalmente el código se mantiene fijo una vez creado.
        return $this;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
        return $this;
    }

    /**
     * MÉTODO CLAVE: __toString
     * Esto permite que cuando hagas: echo $miProyecto;
     * o fwrite($archivo, $miProyecto);
     * Se escriba automáticamente en el formato CSV que necesita tu archivo de texto.
     */
    public function __toString() {
        // Formato: Codigo,Descripcion,Prioridad,Desarrollador1,Desarrollador2...
        $devs = implode(",", $this->desarrolladores);
        return $this->codigo . "," . $this->descripcion . "," . $this->prioridad . "," . $devs;
    }
}
?>