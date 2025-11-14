<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contraseña</title>
</head>

<body>
    <?php
    if (!isset($_REQUEST['nIntroducido'])) {
        $oportunidades = 4;
        $nIntroducido = 0;
        $password = 8888;
    } else {
        $oportunidades = $_POST['oportunidades'];
        $nIntroducido = $_POST['nIntroducido'];
        $password = $_POST['password'];
    }
    if ($nIntroducido == $password) {
        echo "La caja fuerte se ha abierto satisfactoriamente";
    } else {
        if ($oportunidades == 0) {
            echo "Lo siento, has agotado todas tus oportunidades";
        } else {
    ?>
            Te quedan <?= $oportunidades-- ?> oportunidades para adivinar el número.<br>
            <h2>Acceso a caja fuerte</h2>
            <form action="" method="post">
                <label for="introducir">Introduce la contraseña de 4 cifras</label>
                <input type="password" name="nIntroducido" required>
                <input type="hidden" name="oportunidades" value="<?= $oportunidades ?>">
                <input type="hidden" name="password" value= "<?= $password ?>">
                <input type="submit" value="enviar">
            </form>
    <?php
        }
    }
    ?>
</body>

</html>