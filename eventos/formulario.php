<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscripción Eventos</title>
</head>
<body>
    <h1>Formulario de Inscripción</h1>
    <h2>a Eventos</h2>
    <form action="procesar.php" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Correo:</label><br>
        <input type="email" name="correo" required><br><br>

        <input type="submit" value="Inscribirse">
    </form>
    <br><a href="listar.php">Ver inscritos</a>
</body>
</html>
