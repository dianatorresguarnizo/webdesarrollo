<?php
    require 'conexion.php';
    $resultado = $conexion->query("SELECT * FROM inscripciones");
?>

<h2>Lista de Inscritos</h2>
<a href="formulario.php">Nueva inscripción</a>
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Fecha</th>
        <th>Acciones</th>
    </tr>
    <?php while ($registros = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?= $registros['id'] ?></td>
            <td><?= $registros['nombre'] ?></td>
            <td><?= $registros['correo'] ?></td>
            <td><?= $registros['fecha_inscripcion'] ?></td>
            <td>
                <a href="editar.php?id=<?= $registros['id'] ?>">Actualizar</a> |
                <a href="eliminar.php?id=<?= $registros['id'] ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
</table>
