<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
</head>

<body>
    <?php
         $curriculums = unserialize(base64_decode($_GET['curriculums']));

         foreach ($curriculums as $dni => $datos) {
            # code...
         }
    ?>
</body>

</html>