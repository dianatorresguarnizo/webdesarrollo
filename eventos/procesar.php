<?php
    // Incluimos el archivo que contiene la conexión a la base de datos
    require 'conexion.php';

    // Verificamos si el formulario fue enviado mediante el método POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Obtenemos los datos enviados desde el formulario
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];

        // Preparamos una consulta SQL segura para insertar los datos
        $consulta = $conexion->prepare("INSERT INTO inscripciones (nombre, correo) VALUES (?, ?)");

        // "ss" indica que se están enviando dos cadenas de texto (string, string)
        $consulta->bind_param("ss", $nombre, $correo);

        // Ejecutamos la consulta
        if ($consulta->execute()) {
            // Si se insertó, redirigimos al usuario a la página de listar
              header("Location: listar.php");
        } else {
            // Si hubo un error, lo mostramos
            echo "Error al inscribirse: " . $consulta->error;
        }

        // Cerramos la consulta y la conexión
        $consulta->close();
        $conexion->close();
    }
?>
