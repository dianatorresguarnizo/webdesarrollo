<?php
    //Datos de conexión
    $host = "localhost"; 
    $usuario = "root";
    $contrasena = "";
    $bd = "eventos_db";

    //Crear el objeto conexión a la BD
    $conexion = new mysqli($host, $usuario, $contrasena, $bd);

    //Verificar errores de conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error); //error
    }
?>