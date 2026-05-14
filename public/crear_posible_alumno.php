<?php
session_start();

// Solo Admin puede registrar posibles alumnos
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
    <title>Registrar Posible Alumno</title>
    <link rel="stylesheet" href="/proyecto-practicas-local/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        p {text-align: center;
           height: 10px;}
    </style>
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

    <h2>Registrar Posible Alumno</h2>

    <form novalidate action="../config/guardar_posible_alumno.php" method="POST">

        <h3>Datos del posible alumno</h3>

        <label>Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <p id="error_nombre" style="color: red; font-size: 16px;"></p>

        <label>Apellidos</label>
        <input type="text" name="apellidos" id="apellidos" required>
        <p id="error_apellidos" style="color: red; font-size: 16px;"></p>

        <label>Nivel</label>
        <select name="nivel_interes" id="nivel_interes" required>
            <option value="" selected>Elige una opción</option>
            <option value="Iniciación">Iniciación</option>
            <option value="Intermedio">Intermedio</option>
            <option value="Avanzado">Avanzado</option>
        </select>
        <p id="error_nivel_interes" style="color: red; font-size: 16px;"></p>

        <label>Fecha interés</label>
        <input type="date" name="fecha_interes" id="fecha_interes" required>
        <p id="error_fecha_interes" style="color: red; font-size: 16px;"></p>

        <label>Tipo de interés</label>
        <select name="tipo_interes" required>
            <option value="No insistir">No insistir</option>
            <option value="Avisar más adelante">Avisar más adelante</option>
            <option value="Ex alumno">Ex alumno</option>
        </select>        

        <label>Clase de prueba</label>
        <select name="clase_prueba">
            <option value="0">No realizada</option>
            <option value="1">Realizada</option>
        </select>

        <label>Apuntado</label>
        <select name="apuntado">
            <option value="0">No</option>
            <option value="1">Sí</option>
        </select>

        <label>Fecha apuntado</label>
        <input type="date" name="fecha_apuntado">        

        <label>Horario apuntado</label>
        <input type="time" name="horario_apuntado">

        <label>Email</label>
        <input type="email" name="email" id="email" required>
        <p id="error_email" style="color: red; font-size: 16px;"></p>

        <label>Notas</label>
        <textarea name="notas"></textarea>

        <br><br>
        <button type="submit">Registrar posible alumno</button>

    </form>

</main>
<script src="../js/val_posibles_alumnos.js"></script>
</body>
</html>
