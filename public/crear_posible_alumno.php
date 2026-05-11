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

    <h2>Registrar Posible Alumno</h2>

    <form action="../config/guardar_posible_alumno.php" method="POST">

        <h3>Datos del posible alumno</h3>

        <label>Nombre</label>
        <input type="text" name="nombre" required>

        <label>Apellidos</label>
        <input type="text" name="apellidos" required>

        <label>Nivel de interés</label>
        <select name="nivel_interes" required>
            <option value="Iniciación">Iniciación</option>
            <option value="Intermedio">Intermedio</option>
            <option value="Avanzado">Avanzado</option>
        </select>

        <label>Fecha interés</label>
        <input type="date" name="fecha_interes" required>

        <label>Tipo de interés</label>
        <select name="tipo_interes" required>
            <option value="No insistir">No insistir</option>
            <option value="Avisar más adelante">Avisar más adelante</option>
            <option value="Ex alumno">Ex alumno</option>
        </select>

        <label>Clase de prueba</label>
        <select name="clase_prueba" required>
            <option value="0">No realizada</option>
            <option value="1">Realizada</option>
        </select>

        <label>Apuntado</label>
        <select name="apuntado" required>
            <option value="0">No</option>
            <option value="1">Sí</option>
        </select>

        <label>Fecha apuntado</label>
        <input type="date" name="fecha_apuntado">

        <label>Horario apuntado</label>
        <input type="time" name="horario_apuntado">

        <label>Email</label>
        <input type="email" name="email">

        <label>Notas</label>
        <textarea name="notas"></textarea>

        <br><br>
        <button type="submit">Registrar posible alumno</button>

    </form>

</main>

</body>
</html>
