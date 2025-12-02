<?php
function agregarEquipo($nombre, $equipo){
    $archivo = 'Equipos.txt';
    if (!file_exists($archivo)) {

        // Sino existe el archivo, lo creamos
        $archivo = fopen($archivo, 'w');

        if ($archivo) {
            fputs($archivo,  $nombre . ' - ' . $equipo . PHP_EOL);
            fclose($archivo);
        }else{
            echo 'Error al crear el archivo';
        }

    }else{
        $archivo = fopen($archivo, 'a');
        
        if ($archivo) {
            fputs($archivo, $nombre . ' - ' . $equipo . PHP_EOL);
            fclose($archivo);
        }else{
            echo 'Error al abrir el archivo';
        }
    }
}
  
?>