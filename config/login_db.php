<?php
session_start();
require __DIR__ . '/../src/conexion.php';

// 1. Comprobar que llegan los datos
if (!isset($_POST['user'], $_POST['pass'])) {
    header("Location: ../public/login.php?error=1");
    exit;
}

$user = trim($_POST['user']);
$pass = trim($_POST['pass']);

// 2. Buscar usuario en la BD
$sql = "SELECT id_usuario, nombre_usuario, password, tipo 
        FROM usuarios 
        WHERE nombre_usuario = ? 
        LIMIT 1";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

// 3. Validar existencia
if ($result->num_rows === 0) {
    header("Location: ../public/login.php?error=1");
    exit;
}

$usuario = $result->fetch_assoc();

// 4. Validar contraseña (texto plano o hash)
$hash = $usuario['password'];
$login_ok = false;

// Contraseña en texto plano
if ($pass === $hash) {
    $login_ok = true;
}

// Contraseña encriptada
if (password_verify($pass, $hash)) {
    $login_ok = true;
}

if (!$login_ok) {
    header("Location: ../public/login.php?error=1");
    exit;
}

// 5. Crear sesión
$_SESSION['id_usuario'] = $usuario['id_usuario'];
$_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
$_SESSION['tipo'] = $usuario['tipo'];

// Mensaje de bienvenida (solo una vez)
$_SESSION['mensaje_bienvenida'] = "Bienvenido, " . $usuario['nombre_usuario'];

// 6. Redirigir al inicio
header("Location: ../public/index.php");
exit;
