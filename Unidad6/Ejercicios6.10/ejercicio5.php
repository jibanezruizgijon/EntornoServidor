<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $dias = ["07"=>"Domingo","01"=>"Lunes","02"=> "Martes","03"=> "Miércoles","04"=> "Jueves","05"=> "Viernes","06"=> "Sábado"];

    if (isset($_GET['opcion'])) {
        $dia = $_GET['opcion'];
        echo date("d-m-y", strtotime($dia));
    }
    ?>

    <form action="" method="get">
        <select name="opcion">
            <option value="Monday">Lunes</option>
            <option value="Tuesday">Martes</option>
            <option value="Wednesday">Miércoles</option>
            <option value="Thursday">Jueves</option>
            <option value="Friday">Viernes</option>
            <option value="Sathurday">Sábado</option>
            <option value="Sunday">Domingo</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>