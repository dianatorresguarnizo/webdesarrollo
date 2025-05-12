<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-primary">Registrar Nuevo Usuario</h2>
    <form method="post" class="card p-4 shadow-sm bg-white rounded">
        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre_usuario" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Correo:</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Usuario</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre_usuario'];
        $correo = $_POST['correo'];

        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre_usuario, correo) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $correo);
        $stmt->execute();
        echo "<div class='alert alert-success mt-3'>Usuario registrado correctamente.</div>";
        $stmt->close();
    }
    ?>
</div>

</body>
</html>
