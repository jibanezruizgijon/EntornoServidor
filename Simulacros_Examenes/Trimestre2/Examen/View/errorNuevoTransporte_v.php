<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body {
            font-family: sans-serif;
        }

        h1 {
            color: red;
        }
    </style>
</head>

<body>
    <h1> <?= $error ?></h1>
    <h3><?= $mensaje ?></h3>
    <form action="../Controller/index.php" method="post">
        <input type="submit" value="Página Principal">
    </form>
</body>

</html>