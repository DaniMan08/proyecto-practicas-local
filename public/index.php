<?php
session_start();

// Solo usuarios logueados pueden entrar
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<header class="cabecera">
    <h1>ESCUELA DE TEATRO</h1>
</header>

<aside class="barra-lateral">

    <a href="index.php" class="activo">
        <i class="fas fa-home"></i> Inicio
    </a>

    <a href="formulario.php">
        <i class="fas fa-comment"></i> Mensajes
    </a>

    <?php if ($_SESSION['tipo'] === 'Admin') { ?>
        <a href="registro.php">
            <i class="fas fa-users"></i> Registro
        </a>
    <?php } ?>

    <a href="historial.php">
        <i class="fas fa-file-alt"></i> Historial
    </a>

    <a href="logout.php">
        <i class="fas fa-right-from-bracket"></i> Salir
    </a>

</aside>

<main class="contenido">

    <h2>Inicio</h2>

    <?php
    if (isset($_SESSION['mensaje_bienvenida'])) {
        echo "<p>{$_SESSION['mensaje_bienvenida']}</p>";
        unset($_SESSION['mensaje_bienvenida']);
    }
    ?>

    <p>Selecciona una opción del menú para comenzar.</p>

</main>

</body>
</html>
