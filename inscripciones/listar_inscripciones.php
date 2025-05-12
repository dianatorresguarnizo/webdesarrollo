<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Inscripciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-success mb-4">Listado de Inscripciones</h2>

    <?php
    $sql = "
        SELECT i.nombre_evento, i.fecha, u.nombre_usuario 
        FROM inscripciones i 
        JOIN usuarios u ON i.usuario_id = u.id
    ";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0): ?>
        <table class="table table-bordered table-striped shadow-sm bg-white">
            <thead class="table-dark">
                <tr>
                    <th>Nombre del Evento</th>
                    <th>Fecha</th>
                    <th>Usuario</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($fila['nombre_evento']) ?></td>
                        <td><?= htmlspecialchars($fila['fecha']) ?></td>
                        <td><?= htmlspecialchars($fila['nombre_usuario']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning">No hay inscripciones registradas.</div>
    <?php endif; ?>

</div>

</body>
</html>
