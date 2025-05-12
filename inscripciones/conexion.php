<?php
    $conexion = new mysqli("127.0.0.1", "root", "", "inscripciones");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
?>