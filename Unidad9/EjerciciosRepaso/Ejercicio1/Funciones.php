<?php
 function agregarFichero($user, $password){
    $ruta = 'usuarios.txt';
    if (file_exists($ruta)) {
      // Abrimos el archivo en modo escritura
      $archivo = fopen($ruta, 'a');
  
      // Escribimos las credenciales en el fichero de texto
      fputs($archivo, PHP_EOL . $user . ' - ' . $password . PHP_EOL);
      fclose($archivo);
    }
} 

function existeUsuario($user){
  $ruta = 'usuarios.txt';
  if (file_exists($ruta)) {
    // Abrimos el archivo en modo lectura
    $archivo = fopen($ruta, 'r');

    // Leemos el fichero línea por línea
    while (!feof($archivo)) {
      $linea = fgets($archivo);

      // Dividimos la línea para sacar el nombre
      $dividirLinea = explode('-', $linea);

      // Buscamos al usuario
      if (trim($dividirLinea[0]) === $user) {
        fclose($archivo);

        // El usuario ya existe
        return true;
      }
    }
    fclose($archivo);
  }else{
    echo 'Error al abrir el archivo para lectura';
  }

  // El usuario no existe
  return false;
}

function creacionFechaHora(){
  return date('d/m/Y H:i:s');
  // return time();
}
?>