<?php
session_start();

// Solo Admin puede registrar usuarios del sistema
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
    <title>Registrar Usuario del Sistema</title>
    <link rel="stylesheet" href="/proyecto-practicas-local-main/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<header class="cabecera">
    <h1>ESCUELA DE TEATRO</h1>
</header>

<aside class="barra-lateral">

    <a href="index.php" class="icono">
        <i class="fas fa-home"></i>
    </a>

    <a href="formulario.php" class="icono">
        <i class="fas fa-comment"></i>
    </a>

    <a href="registro.php" class="icono activo">
        <i class="fas fa-users"></i>
    </a>

    <a href="historial.php" class="icono">
        <i class="fas fa-file-alt"></i>
    </a>

    <a href="logout.php" class="icono">
        <i class="fas fa-right-from-bracket"></i>
    </a>

</aside>

<main class="contenido">

    <h2>Registrar Usuario del Sistema</h2>

    <form action="../config/guardar_usuario.php" method="POST">

        <h3>Datos del usuario</h3>

        <label>Nombre de usuario</label>
        <input type="text" name="nombre_usuario" required>

        <label>Contraseña</label>
        <input type="password" name="password" required>

        <label>Tipo de usuario</label>
        <select name="tipo" required>
            <option value="Admin">Administrador</option>
            <option value="Empleado">Empleado</option>
            <option value="Alumno">Alumno</option>
        </select>

        <br><br>
        <button type="submit">Registrar usuario</button>

    </form>

</main>

</body>
</html>
