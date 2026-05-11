<?php
session_start();

// Solo Admin puede registrar alumnos
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
$nombre      = trim($_POST['nombre'] ?? '');
$apellidos   = trim($_POST['apellidos'] ?? '');
$email       = trim($_POST['email'] ?? '');
$telefono    = trim($_POST['telefono'] ?? '');
$fecha_alta  = trim($_POST['fecha_alta'] ?? '');
$estado      = trim($_POST['estado'] ?? '');

// 2. Validación básica
if ($nombre === '' || $apellidos === '' || $email === '' || 
    $telefono === '' || $fecha_alta === '' || $estado === '') {
    die("Error: Todos los campos son obligatorios.");
}

// Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Error: El email no es válido.");
}

// 3. Comprobar si el email ya existe en alumnos
$sql_check = "SELECT id_alumno FROM alumnos WHERE email = ?";
$stmt_check = $conexion->prepare($sql_check);
$stmt_check->bind_param("s", $email);
$stmt_check->execute();
$res_check = $stmt_check->get_result();

if ($res_check->num_rows > 0) {
    die("Error: Ya existe un alumno con ese email.");
}

// 4. Insertar alumno en la base de datos
$sql = "INSERT INTO alumnos (nombre, apellidos, email, telefono, fecha_alta, estado)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssssss", $nombre, $apellidos, $email, $telefono, $fecha_alta, $estado);

// 5. Redirección final
if ($stmt->execute()) {
    header("Location: ../public/registro.php?ok=alumno");
    exit;
} else {
    echo "<h2>Error al registrar el alumno.</h2>";
    echo "<p>" . $stmt->error . "</p>";
}
