<?php
session_start();

// Solo Admin puede registrar alumnos
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
    <title>Registrar Alumno</title>
    <link rel="stylesheet" href="/proyecto-practicas-local/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        p {text-align: center;  
           height: 10px;        
        }
    </style>
</head>
<body>

<header class="cabecera">
    <h1>ESCUELA DE TEATRO</h1>
</header>

<aside class="barra-lateral">

  <a href="index.php" class="icono">
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
    
    <a href="registro.php" class="icono activo" title="Usuarios">
        <i class="fas fa-user"></i>
        <span>Registro de Usuarios</span>
    </a>

    <a href="logout.php" class="icono">
        <i class="fas fa-right-from-bracket"></i>
        <span>Cerrar Sesión</span>
    </a>

</aside>


<main class="contenido">

    <h2>Registrar Alumno</h2>

    <form novalidate action="../config/guardar_alumno.php" method="POST">

        <h3>Datos del alumno</h3>

        <label>Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <p id="error_nombre" style="color: red; font-size: 16px;"></p>

        <label>Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" required>
        <p id="error_apellidos" style="color: red; font-size: 16px;"></p>

        <label>Email</label>
        <input type="email" name="email" id="email" required>
        <p id="error_email" style="color: red; font-size: 16px;"></p>

        <label>Teléfono</label>
        <input type="tel" name="telefono" id="telefono" placeholder="917777777 respeta el formato" required>
        <p id="error_telefono" style="color: red; font-size: 16px;"></p>

        <label>Fecha alta</label>
        <input type="date" name="fecha_alta" id="fecha_alta" required>
        <p id="error_fecha_alta" style="color: red; font-size: 16px;"></p>

        <label>Estado</label>
        <select name="estado" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select>

        <br><br>
        <button type="submit">Registrar alumno</button>

    </form>

</main>
<script src="../js/val_profes_y_alumnos.js"></script>
</body>
</html>
