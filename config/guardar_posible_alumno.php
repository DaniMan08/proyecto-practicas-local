<?php
session_start();

// Solo Admin puede registrar posibles alumnos
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../public/login.php");
    exit;
}

if ($_SESSION['tipo'] !== 'Admin') {
    echo "<h2>No tienes permiso para realizar esta acción.</h2>";
    exit;
}

require __DIR__ . '/../src/conexion.php';

// 1. Recoger datos del formulario
$nombre           = trim($_POST['nombre'] ?? '');
$apellidos        = trim($_POST['apellidos'] ?? '');
$nivel_interes    = trim($_POST['nivel_interes'] ?? '');
$fecha_interes    = trim($_POST['fecha_interes'] ?? '');
$tipo_interes     = trim($_POST['tipo_interes'] ?? '');
$clase_prueba     = trim($_POST['clase_prueba'] ?? '');
$apuntado         = trim($_POST['apuntado'] ?? '');
$fecha_apuntado   = trim($_POST['fecha_apuntado'] ?? '');
$horario_apuntado = trim($_POST['horario_apuntado'] ?? '');
$email            = trim($_POST['email'] ?? '');
$notas            = trim($_POST['notas'] ?? '');

// 2. Validación básica
if ($nombre === '' || $apellidos === '' || $nivel_interes === '' || 
    $fecha_interes === '' || $tipo_interes === '') {
    die("Error: Faltan campos obligatorios.");
}

// Validar email si se ha introducido
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Error: El email no es válido.");
}

// 3. Insertar en la base de datos
$sql = "INSERT INTO posibles_alumnos 
(nombre, apellidos, nivel_interes, fecha_interes, tipo_interes, clase_prueba, apuntado, fecha_apuntado, horario_apuntado, notas, email)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param(
    "sssssiissss",
    $nombre,
    $apellidos,
    $nivel_interes,
    $fecha_interes,
    $tipo_interes,
    $clase_prueba,
    $apuntado,
    $fecha_apuntado,
    $horario_apuntado,
    $notas,
    $email
);

// 4. Redirección final
if ($stmt->execute()) {
    header("Location: ../public/registro.php?ok=posible_alumno");
    exit;
} else {
    echo "<h2>Error al registrar el posible alumno.</h2>";
    echo "<p>" . $stmt->error . "</p>";
}
