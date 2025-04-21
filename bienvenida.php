<?php
session_start();

if (isset($_SESSION['usuario']) && isset($_SESSION['rol'])) {
    echo "Hola, " . $_SESSION['usuario'] . ". Tu rol es: " . $_SESSION['rol'];
} else {
    echo "No hay sesión activa. Por favor <a href='login.php'>inicia sesión</a>.";
}
?>