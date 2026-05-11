<?php
session_start();

// Solo Admin puede registrar profesores
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
    <title>Registrar Profesor</title>
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

    <a href="mensajeria.php" class="icono">
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

    <h2>Registrar Profesor</h2>

    <form action="../config/guardar_profesor.php" method="POST">

        <h3>Datos del profesor</h3>

        <label>Nombre</label>
        <input type="text" name="nombre" required>

        <label>Apellidos</label>
        <input type="text" name="apellidos" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Teléfono</label>
        <input type="tel" name="telefono" required>

        <label>Fecha alta</label>
        <input type="date" name="fecha_alta" required>

        <label>Estado</label>
        <select name="estado" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>

        <!-- El rol SIEMPRE será Profesor -->
        <input type="hidden" name="rol" value="Profesor">

        <br><br>
        <button type="submit">Registrar profesor</button>

    </form>

</main>

</body>
</html>
