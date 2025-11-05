<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Palabra</title>
</head>
<body>
    <h2>Añade la palabra</h2>

    <form action="ejercicio8.php" method="post">
        <label>Introduce la palabra en español</label>
        <input type="text" name="spain" readonly value="">
        <br><br>
        <label>Introduce la palabra en Inglés</label>
        <input type="text" name="english">
        <br><br>
        <input type="submit" value="Añadir">
    </form>
</body>
</html>