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
    <link rel="stylesheet" href="/proyecto-practicas-local/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<header class="cabecera">
    <h1>ESCUELA DE TEATRO</h1>
</header>

<aside class="barra-lateral">

    <a href="index.php" class="icono activo">
        <i class="fas fa-home"></i>
        <span>Inicio</span>
    </a>

    <a href="mensajeria.php" class="icono">
        <i class="fas fa-comment"></i>
        <span>Mensajes</span>
    </a>

    <?php if ($_SESSION['tipo'] === 'Admin') { ?>
        <a href="registro.php" class="icono">
            <i class="fas fa-users"></i>
            <span>Registro de Grupos</span>
        </a>
    <?php } ?>
    
    <a href="registro.php" class="icono" title="Usuarios">
        <i class="fas fa-user"></i>
        <span>Registro de Usuarios</span>
    </a>


    <a href="logout.php" class="icono">
        <i class="fas fa-right-from-bracket"></i>
        <span>Cerrar Sesión</span>
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

 <p class="subtitulo-inicio subtitulo-mensajes">Selecciona una opción del menú para comenzar.</p>
    <div class="tarjetas-contenedor">
        <div class="tarjeta">
            <a href="mensajeria.php">
                <div class="circulo"></div>
            </a>
            <p>Mensajes</p>
        </div>
        

        <div class="tarjeta">
            <a href="grupo.php"> 
                <div class="circulo"></div>
            </a>
            <p>Grupos</p>
        </div>

        <div class="tarjeta">
            <a href="usuarios.php"> 
                <div class="circulo"></div>
            </a>
            <p>Usuarios</p>
        </div>
    </div>
</main>
</body>
</html>
