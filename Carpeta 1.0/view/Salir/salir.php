<?php
require_once("../../conf/conexion.php");

// Asegúrate de que la sesión está iniciada
session_start();

// Destruir todas las variables de sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión
header("Location: " . Conectar::ruta() . "index.php");
exit();
?>
