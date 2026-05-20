<?php
session_start();

// Solo Admin y Empleado pueden ver esta página
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['tipo'] !== 'Admin' && $_SESSION['tipo'] !== 'Empleado') {
    echo "<h2>No tienes permiso para acceder a esta página.</h2>";
    exit;
}

$usuario = $_SESSION['usuario'];
$tipo    = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensajes</title>
    <link rel="stylesheet" href="/proyecto-practicas-local/style.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<!-- cabecera -->
<header class="cabecera">
    <h1>ESCUELA DE TEATRO</h1>
</header>

<!-- barra lateral -->
<aside class="barra-lateral">

    <a href="index.php" class="icono">
        <i class="fas fa-home"></i>
    </a>

    <a href="mensajeria.php" class="icono activo">
        <i class="fas fa-comment"></i>
    </a>

    <?php if ($tipo === 'Admin') { ?>
        <a href="crear_alumno.php" class="icono">
            <i class="fas fa-users"></i>
        </a>

    <?php } ?>

    <a href="historial.php" class="icono">
        <i class="fas fa-file-alt"></i>
    </a>

    <a href="logout.php" class="icono">
        <i class="fas fa-right-from-bracket"></i>
    </a>

</aside>

<!-- contenido principal -->
<main class="contenido">
    
    <h2>Mensajes</h2>
    <p class="subtitulo-inicio subtitulo-mensajes">Selecciona una opción para gestionar tus mensajes.</p>
    <div class="tarjetas-contenedor">

    <a href="formulario.php" class="tarjeta">
        <div class="circulo">
            <i class="fas fa-pen"></i>
        </div>

        <p>Nuevo mensaje</p>
    </a>

    <a href="historial.php" class="tarjeta">
        <div class="circulo">
            <i class="fas fa-inbox"></i>
        </div>

        <p>Bandeja de entrada</p>
    </a>

</div>
</main>

</body>
</html>
