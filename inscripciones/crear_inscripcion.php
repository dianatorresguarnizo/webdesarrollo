<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inscripción a Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-primary mb-4">Inscripción a Evento</h2>

    <form method="post" class="card p-4 shadow-sm bg-white rounded">
        <div class="mb-3">
            <label class="form-label">Nombre del evento:</label>
            <input type="text" name="nombre_evento" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Fecha:</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Usuario:</label>
            <select name="usuario_id" class="form-select" required>
                <option value="">Seleccione un usuario</option>
                <?php
                $usuarios = $conexion->query("SELECT id, nombre_usuario FROM usuarios");
                while ($user = $usuarios->fetch_assoc()) {
                    echo "<option value='{$user['id']}'>{$user['nombre_usuario']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar inscripción</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $evento = $_POST['nombre_evento'];
        $fecha = $_POST['fecha'];
        $usuario_id = $_POST['usuario_id'];

        // Prepara y ejecuta la consulta
        $stmt = $conexion->prepare("INSERT INTO inscripciones (nombre_evento, fecha, usuario_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $evento, $fecha, $usuario_id);
        
        if ($stmt->execute()) {
            echo "<div class='alert alert-success mt-3'>Inscripción registrada con éxito.</div>";
        } else {
            echo "<div class='alert alert-danger mt-3'>Error al registrar la inscripción: " . $stmt->error . "</div>";
        }

        $stmt->close();
    }
    ?>
</div>

</body>
</html>
