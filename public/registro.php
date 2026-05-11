<?php
session_start();

// Solo Admin puede acceder a esta página
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['tipo'] !== 'Admin') {
    echo "<h2>No tienes permiso para acceder a esta página.</h2>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de usuarios</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<header class="cabecera">
    <h1>ESCUELA DE TEATRO</h1>
</header>

<aside class="barra-lateral">

    <a href="index.php">
        <i class="fas fa-home"></i> Inicio
    </a>

    <a href="formulario.php">
        <i class="fas fa-comment"></i> Mensajes
    </a>

    <a href="registro.php" class="activo">
        <i class="fas fa-users"></i> Registro
    </a>

    <a href="historial.php">
        <i class="fas fa-file-alt"></i> Historial
    </a>

    <a href="logout.php">
        <i class="fas fa-right-from-bracket"></i> Salir
    </a>

</aside>

<main class="contenido">

    <h2>Registro de usuarios</h2>

    <?php
    if (isset($_GET['ok'])) {

        $mensajes = [
            'profesor'        => 'Profesor registrado correctamente.',
            'alumno'          => 'Alumno registrado correctamente.',
            'posible_alumno'  => 'Posible alumno registrado correctamente.',
            'usuario'         => 'Usuario del sistema registrado correctamente.'
        ];

        if (isset($mensajes[$_GET['ok']])) {
            echo "<p>{$mensajes[$_GET['ok']]}</p>";
        }
    }
    ?>

    <p>Selecciona qué tipo de usuario deseas registrar:</p>

    <ul>
        <li><a href="crear_profesor.php">Registrar Profesor</a></li>
        <li><a href="crear_alumno.php">Registrar Alumno</a></li>
        <li><a href="crear_posible_alumno.php">Registrar Posible Alumno</a></li>
        <li><a href="crear_usuario.php">Registrar Usuario del Sistema</a></li>
    </ul>

</main>

</body>
</html>
