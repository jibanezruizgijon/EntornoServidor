<?php
include_once 'Funciones.php';
include_once 'Nota.php';

if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['cerrar_sesion'])) {
   $_SESSION['notas'][$_SESSION['user']] = [];
   setcookie('username', NULL, -1);
   setcookie('password', NULL, -1);
   header('Location: login.php');
}

if (isset($_POST['recordar'])) {
   $usuario = $_REQUEST['username'];
   $password = $_REQUEST['password'];
   setcookie('username', $usuario, strtotime("+3 months"));
   setcookie('password', $password, strtotime("+3 months"));
}

if (empty($_REQUEST['username']) && !isset($_SESSION['user'])) {
   header('Location: login.php');
}

if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
   if (!existeUsuario($_REQUEST['username'])) {
      header('Location: login.php');
   } else {
      $_SESSION['user'] = $_REQUEST['username'];
   }
}

if (!isset($_SESSION['notas'])) {
   $_SESSION['notas'] = [];
}


// Cargamos notas desde la cookie si existen
if (isset($_COOKIE['notas_' . $_SESSION['user']])) {
   $_SESSION['notas'][$_SESSION['user']] = unserialize($_COOKIE['notas_' . $_SESSION['user']]);
}

if (isset($_REQUEST['titulo']) && isset($_REQUEST['texto'])) {
   $nota = new Nota($_REQUEST['titulo'], $_REQUEST['texto']);

   if (!isset($_SESSION['notas'][$_SESSION['user']])) {
      $_SESSION['notas'][$_SESSION['user']] = [];
   }

   // Las notas de cada usuario
   $_SESSION['notas'][$_SESSION['user']][] = serialize($nota);

   setcookie('notas_' . $_SESSION['user'], serialize($_SESSION['notas'][$_SESSION['user']]), strtotime("+3 months"));
}

// LAS COOKIES



?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Página principal</title>
</head>

<body>
   <h1>Panel de notas del usuario <?= $_SESSION['user'] ?></h1>
   <table border="5px solid black">
      <tr>
         <th colspan="3">
            <?= Nota::ultimaNotaCreada(($_SESSION['user'])) ?>
         </th>
      </tr>
      <tr>
         <th style="font-weight: 900;">Titulo</th>
         <th>Pincha el enlace para visualizar el texto</th>
         <th style="font-weight: 900;">Fecha Creación</th>
      </tr>
      <?php
      if (isset($_SESSION['notas'][$_SESSION['user']])) {
         foreach ($_SESSION['notas'][$_SESSION['user']] as $nota) {
            $nota = unserialize($nota);
            echo '<tr>';
            echo '<td><a href="?titulo=' . $nota->getTitulo() . '">' . $nota->getTitulo() . '</a></td>';
            echo '<td>';
            // Verificar si se ha solicitado mostrar el texto de una nota específica
            if (isset($_GET['titulo']) && $_GET['titulo'] === $nota->getTitulo()) {
               echo $nota->getTexto(); // Muestra el texto de la nota si se ha seleccionado
            }
            // echo '</tr>';
            echo '<td>' . $nota->getCreacion() . '</td>';
            echo '</tr>';
         }
      }
      ?>
   </table><br><br>

   <h2>Añadir nota nueva</h2>
   <form action="#" method="post">
      TITULO: <input type="text" name="titulo" required><br>
      TEXTO: <textarea name="texto" cols="30" rows="10" required></textarea><br><br>
      <input type="submit" value="AÑADIR" name="añadir"><br><br>
   </form>
   <form action="#" method="post">
      <input type="submit" value="Cerrar Sesión" name="cerrar_sesion">
   </form>
   <a href="login.php"> Regresar</a>
</body>

</html>