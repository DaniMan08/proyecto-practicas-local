<?php
session_start();

// Solo Admin y Empleado pueden ver detalles de mensajes
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['tipo'] !== 'Admin' && $_SESSION['tipo'] !== 'Empleado') {
    echo "<h2>No tienes permiso para acceder a esta página.</h2>";
    exit;
}

require __DIR__ . '/../src/conexion.php';

// Validar parámetro
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>Error: ID de mensaje no válido.</p>";
    exit;
}

$idMensaje = intval($_GET['id']);

// 1. Obtener datos del mensaje
$sqlMsg = "
    SELECT 
        m.id_mensaje,
        m.asunto,
        m.contenido,
        m.fecha_envio,
        m.canal,
        u.nombre_usuario AS remitente
    FROM mensaje m
    JOIN usuarios u ON u.id_usuario = m.id_remitente
    WHERE m.id_mensaje = ?
";

$stmt = $conexion->prepare($sqlMsg);
$stmt->bind_param("i", $idMensaje);
$stmt->execute();
$resultMsg = $stmt->get_result();

if ($resultMsg->num_rows === 0) {
    echo "<p>El mensaje no existe.</p>";
    exit;
}

$mensaje = $resultMsg->fetch_assoc();

// 2. Obtener destinatarios del mensaje
$sqlDest = "
    SELECT 
        a.nombre,
        a.apellidos,
        a.email,
        md.estado_envio
    FROM mensaje_destinatario md
    JOIN alumnos a ON a.id_alumno = md.id_destinatario
    WHERE md.mensaje_id = ?
";

$stmt2 = $conexion->prepare($sqlDest);
$stmt2->bind_param("i", $idMensaje);
$stmt2->execute();
$resultDest = $stmt2->get_result();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del mensaje</title>
    <link rel="stylesheet" href="/proyecto-practicas-local-main/style.css">
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

<h2>Detalles del mensaje</h2>

<div>
    <p><strong>ID del mensaje:</strong> <?= $mensaje['id_mensaje'] ?></p>
    <p><strong>Asunto:</strong> <?= $mensaje['asunto'] ?></p>
    <p><strong>Contenido:</strong> <?= nl2br($mensaje['contenido']) ?></p>
    <p><strong>Fecha de envío:</strong> <?= $mensaje['fecha_envio'] ?></p>
    <p><strong>Remitente:</strong> <?= $mensaje['remitente'] ?></p>
    <p><strong>Canal:</strong> <?= $mensaje['canal'] ?></p>
</div>

<h3>Destinatarios</h3>

<?php
if ($resultDest->num_rows > 0) {

    echo "<table border='1' cellpadding='5' cellspacing='0'>";

    echo "<tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Estado de envío</th>
          </tr>";

    while ($dest = $resultDest->fetch_assoc()) {
        echo "<tr>
                <td>{$dest['nombre']} {$dest['apellidos']}</td>
                <td>{$dest['email']}</td>
                <td>{$dest['estado_envio']}</td>
              </tr>";
    }

    echo "</table>";

} else {
    echo "<p>No hay destinatarios registrados para este mensaje.</p>";
}
?>

<br>
<a href="historial.php">← Volver al historial</a>

</main>

</body>
</html>
