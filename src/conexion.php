<?php

$conexion = new mysqli('localhost', 'root', '', 'escuela_teatro');

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?>
