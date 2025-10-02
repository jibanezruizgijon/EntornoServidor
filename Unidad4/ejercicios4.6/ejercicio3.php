<?php
// Respuesta correcta
$respuesta_correcta = "vaca";

$mensaje = "";
$mostrarImagen = false;
$intentos = 0;

// Si se envía el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recuperamos intentos anteriores enviados por hidden
    if (isset($_POST['intentos'])) {
        $intentos = intval($_POST['intentos']);
    }

    $intentos++; // incrementamos los intentos

    $respuesta = strtolower(trim($_POST["respuesta"]));
    if ($respuesta === $respuesta_correcta) {
        $mensaje = " Has acertado en $intentos intentos.";
        $mostrarImagen = true;
    } else {
        $mensaje = " Has fallado. Intento número $intentos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>
    <style>
        body {
            text-align: center;
            margin: 20px;
        }

        table {
            margin: auto;
            border-collapse: collapse;
        }

        td {
            width: 100px;
            height: 100px;
            border: 1px solid #444;
            background: gray;
            background-image: url('vaca.jpg');
            background-size: 300px 300px;
            cursor: pointer;
        }

        /* Fragmentos */
        .p1 { background-position: 0 0; }
        .p2 { background-position: -100px 0; }
        .p3 { background-position: -200px 0; }
        .p4 { background-position: 0 -100px; }
        .p5 { background-position: -100px -100px; }
        .p6 { background-position: -200px -100px; }
        .p7 { background-position: 0 -200px; }
        .p8 { background-position: -100px -200px; }
        .p9 { background-position: -200px -200px; }

        .oculto {
            background-color: gray;
            background-image: none;
        }

        .imagen-completa {
            width: 300px;
            margin: 20px auto;
        }
    </style>

    <script>
        let bloqueActivo = false;

        function mostrar(celda) {
            if (bloqueActivo) return;
            bloqueActivo = true;

            celda.classList.remove("oculto");
            setTimeout(function() {
                celda.classList.add("oculto");
                bloqueActivo = false;
            }, 2000);
        }
    </script>
</head>

<body>

<h2>Juego: Adivina la Imagen</h2>
<?php
  if (!$mostrarImagen) {
   echo "<h3>Tienes  $intentos intentos</h3>";
  }  
?>

<?php 
if ($mostrarImagen) { 
?>
    <img src="vaca.jpg" class="imagen-completa">
    <p><?= $mensaje ?></p>
<?php 
} else { 
?>
    <table>
        <tr>
            <td class="p1 oculto" onclick="mostrar(this)"></td>
            <td class="p2 oculto" onclick="mostrar(this)"></td>
            <td class="p3 oculto" onclick="mostrar(this)"></td>
        </tr>
        <tr>
            <td class="p4 oculto" onclick="mostrar(this)"></td>
            <td class="p5 oculto" onclick="mostrar(this)"></td>
            <td class="p6 oculto" onclick="mostrar(this)"></td>
        </tr>
        <tr>
            <td class="p7 oculto" onclick="mostrar(this)"></td>
            <td class="p8 oculto" onclick="mostrar(this)"></td>
            <td class="p9 oculto" onclick="mostrar(this)"></td>
        </tr>
    </table>
    <br>

    <form method="post">
        <input type="text" name="respuesta" placeholder="¿Qué es?" required>
        <!-- Input hidden para mantener el número de intentos -->
        <input type="hidden" name="intentos" value="<?= $intentos ?>">
        <button type="submit">Comprobar</button>
    </form>

    <?php if ($mensaje) { ?>
        <p><?= $mensaje ?></p>
    <?php } ?>
<?php } ?>

</body>
</html>
