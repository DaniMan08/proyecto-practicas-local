<?php
session_start();

// Solo Admin y Empleado pueden ver el historial
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['tipo'] !== 'Admin' && $_SESSION['tipo'] !== 'Empleado') {
    echo "<h2>No tienes permiso para acceder a esta página.</h2>";
    exit;
}

require __DIR__ . '/../src/conexion.php';

// Consulta optimizada
$sqlMensajes = "
    SELECT 
        m.id_mensaje,
        m.asunto,
        m.contenido,
        m.fecha_envio,
        m.canal,
        u.nombre_usuario AS remitente,
        COUNT(md.id_destinatario) AS total_destinatarios
    FROM mensaje m
    JOIN usuarios u ON u.id_usuario = m.id_remitente
    LEFT JOIN mensaje_destinatario md ON md.mensaje_id = m.id_mensaje
    GROUP BY m.id_mensaje
    ORDER BY m.fecha_envio DESC
";

$resultMensajes = $conexion->query($sqlMensajes);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de mensajes</title>
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

    <?php if ($_SESSION['tipo'] === 'Admin') { ?>
        <a href="registro.php">
            <i class="fas fa-users"></i> Registro
        </a>
    <?php } ?>

    <a href="historial.php" class="activo">
        <i class="fas fa-file-alt"></i> Historial
    </a>

    <a href="logout.php">
        <i class="fas fa-right-from-bracket"></i> Salir
    </a>

</aside>

<main class="contenido">

<h2>Historial de mensajes</h2>

<?php
// Mensaje de éxito
if (isset($_GET['ok']) && $_GET['ok'] === 'mensaje') {
    echo "<p>Mensaje enviado correctamente.</p>";
}
?>

<?php
if ($resultMensajes->num_rows > 0) {

    while ($msg = $resultMensajes->fetch_assoc()) {

        echo "<div>";

        echo "<h3>📩 Mensaje ID: {$msg['id_mensaje']}</h3>";
        echo "<p><strong>Asunto:</strong> {$msg['asunto']}</p>";
        echo "<p><strong>Contenido:</strong> {$msg['contenido']}</p>";
        echo "<p><strong>Fecha de envío:</strong> {$msg['fecha_envio']}</p>";
        echo "<p><strong>Remitente:</strong> {$msg['remitente']}</p>";
        echo "<p><strong>Canal:</strong> {$msg['canal']}</p>";
        echo "<p><strong>Destinatarios:</strong> {$msg['total_destinatarios']} alumno(s)</p>";

        echo "<a href='ver_mensaje.php?id={$msg['id_mensaje']}'>Ver detalles</a>";

        echo "</div><br>";
    }

} else {
    echo "<p>No hay mensajes enviados todavía.</p>";
}
?>

</main>

</body>
</html>
