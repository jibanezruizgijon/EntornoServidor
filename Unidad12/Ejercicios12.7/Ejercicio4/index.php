<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <body>
    <h1>Consulta de la API Alumno</h1>
    <div class="contenedor">
      <form action="peticion.php" method="post">
        <h2>Filtro por grupo</h2>
        Grupo <input type="text" name="grupo">
        <input type="submit" name="filtraGrupo" value="Filtrar">
      </form>
      <hr>
      <form action="peticion.php" method="post">
        <h2>Filtro por nombre:</h2>
       Nombre <input type="text" name="nombre">
        <input type="submit" name="filtraAlumno" value="Buscar">
      </form>
      <hr>
      <form action="peticion.php" method="post">
        <h2>Asignaturas de un Alumno:</h2>
        Matrícula <input type="text" name="matricula" required>
        <input type="submit" name="filtraAsignatura" value="Ver Asignaturas">
      </form>
      <hr>
      <form action="peticion.php" method="POST">
        <h2>Matriculación de un alumno a una asignatura:</h2>
        Matrícula <input type="text" name="matricula" required>
        Cod Asignatura <input type="text" name="codigo" required>
        <input type="submit" name="matricular" value="Matricular">
      </form>
      <hr>
      <form action="peticion.php" method="POST">
        <h2>Cambio de grupo de un alumno:</h2>
        Mtrícula <input type="text" name="matricula" required>
        Nuevo grupo <input type="text" name="grupo" required> 
        <input type="submit" name="cambiaGrupo" value="Actualizar">
      </form>
      <hr>
      <form action="peticion.php" method="POST">
        <h2>Borrar Alumno:</h2>
        Matrícula <input type="text" name="matricula" required>
        <input type="submit" name="borrar" value="Borrar">
      </form>
    </div>
  </body>
</body>

</html>