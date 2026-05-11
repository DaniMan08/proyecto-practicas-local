<?php
session_start();

// Solo Admin puede registrar profesores
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../public/login.php");
    exit;
}

if ($_SESSION['tipo'] !== 'Admin') {
    echo "<h2>No tienes permiso para realizar esta acción.</h2>";
    exit;
}

require __DIR__ . '/../src/conexion.php';

// 1. Recoger datos
$nombre      = trim($_POST['nombre'] ?? '');
$apellidos   = trim($_POST['apellidos'] ?? '');
$email       = trim($_POST['email'] ?? '');
$telefono    = trim($_POST['telefono'] ?? '');
$fecha_alta  = trim($_POST['fecha_alta'] ?? '');
$estado      = trim($_POST['estado'] ?? '');
$rol         = "Profesor";

// 2. Validación básica
if ($nombre === '' || $apellidos === '' || $email === '' || 
    $telefono === '' || $fecha_alta === '' || $estado === '') {
    die("Error: Todos los campos son obligatorios.");
}

// Validar email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Error: El email no es válido.");
}

// 3. Comprobar si el email ya existe en usuarios
$sql_check = "SELECT id_usuario FROM usuarios WHERE nombre_usuario = ?";
$stmt_check = $conexion->prepare($sql_check);
$stmt_check->bind_param("s", $email);
$stmt_check->execute();
$res_check = $stmt_check->get_result();

if ($res_check->num_rows > 0) {
    die("Error: Ya existe un usuario con ese email.");
}

// 4. Crear usuario asociado
$sql_user = "INSERT INTO usuarios (nombre_usuario, password, tipo)
             VALUES (?, ?, 'Empleado')";

$stmt_user = $conexion->prepare($sql_user);

$password_hash = password_hash("1234", PASSWORD_DEFAULT);

$stmt_user->bind_param("ss", $email, $password_hash);

if (!$stmt_user->execute()) {
    die("Error al crear el usuario del profesor: " . $stmt_user->error);
}

$usuario_id = $stmt_user->insert_id;

// 5. Insertar profesor en empleados
$sql = "INSERT INTO empleados 
(nombre, apellidos, rol, email, telefono, fecha_alta, estado, usuario_id)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param(
    "sssssssi",
    $nombre,
    $apellidos,
    $rol,
    $email,
    $telefono,
    $fecha_alta,
    $estado,
    $usuario_id
);

// 6. Redirección final
if ($stmt->execute()) {
    header("Location: ../public/registro.php?ok=profesor");
    exit;
} else {
    echo "<h2>Error al registrar el profesor.</h2>";
    echo "<p>" . $stmt->error . "</p>";
}
