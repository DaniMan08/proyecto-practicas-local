<?php
session_start();

// Solo Admin puede registrar usuarios del sistema
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
$nombre_usuario = trim($_POST['nombre_usuario'] ?? '');
$password       = trim($_POST['password'] ?? '');
$tipo           = trim($_POST['tipo'] ?? '');

// 2. Validación básica
if ($nombre_usuario === '' || $password === '' || $tipo === '') {
    die("Error: Todos los campos son obligatorios.");
}

// Validar tipo según ENUM real
$tipos_validos = ['Empleado', 'Alumno', 'Admin'];

if (!in_array($tipo, $tipos_validos)) {
    die("Error: Tipo de usuario no válido.");
}

// Validar longitud mínima de contraseña
if (strlen($password) < 4) {
    die("Error: La contraseña debe tener al menos 4 caracteres.");
}

// 3. Comprobar si el nombre de usuario ya existe
$sql_check = "SELECT id_usuario FROM usuarios WHERE nombre_usuario = ?";
$stmt_check = $conexion->prepare($sql_check);
$stmt_check->bind_param("s", $nombre_usuario);
$stmt_check->execute();
$res_check = $stmt_check->get_result();

if ($res_check->num_rows > 0) {
    die("Error: El nombre de usuario ya existe. Prueba otro.");
}

// 4. Encriptar contraseña
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// 5. Insertar usuario en la base de datos
$sql = "INSERT INTO usuarios (nombre_usuario, password, tipo)
        VALUES (?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("sss", $nombre_usuario, $password_hash, $tipo);

// 6. Redirección final
if ($stmt->execute()) {
    header("Location: ../public/registro.php?ok=usuario");
    exit;
} else {
    echo "<h2>Error al registrar el usuario.</h2>";
    echo "<p>" . $stmt->error . "</p>";
}
