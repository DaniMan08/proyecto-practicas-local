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
    <link rel="stylesheet" href="/proyecto-practicas-local/style.css">
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
   
    <a href="historial.php" class="icono activo">
        <i class="fas fa-file-alt"></i>
    </a>

    <a href="logout.php" class="icono">
        <i class="fas fa-right-from-bracket"></i>
    </a>

</aside>


<main class="contenido">

<h2>Historial de mensajes</h2>
<!-- PANEL DE MENSAJES -->
    <div class="panel-mensajes">
        <p class="descripcion-historial">Consulta aquí todos los mensajes enviados.</p>

        <!-- barra superior -->
        <div class="barra-superior">

            <div class="buscador-grande">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Buscar mensajes...">
            </div>

            <div class="filtro-fecha-inline">
                <input type="date">
                <input type="date">
            </div>
            
            <div class="filtros-container">
                <button class="boton-filtros"
                onclick="document.querySelector('.panel-filtros').classList.toggle('activo')">
                    Filtros <i class="fas fa-sliders-h"></i>
                </button>

                <!-- panel desplegable -->
                <div class="panel-filtros">

                    <div class="filtro-grupo">
                        <label>Canal</label>
                        <select class="filtro-select">
                            <option>Todos</option>
                            <option>Email</option>
                            <option>WhatsApp</option>
                        </select>
                    </div>

                    <button class="boton-aplicar">
                        Aplicar filtros
                    </button>

                </div>
            </div>
        </div>
   

<?php
// Mensaje de éxito
if (isset($_GET['ok']) && $_GET['ok'] === 'mensaje') {
    echo "<p>Mensaje enviado correctamente.</p>";
}
?>

<?php
if ($resultMensajes->num_rows > 0) {
echo "<div class='lista-historial-grande'>";
    while ($msg = $resultMensajes->fetch_assoc()) {

        echo "<div class='bloque-historial'>";

        echo "<h3>📩 Mensaje ID: {$msg['id_mensaje']}</h3>";
        echo "<p><strong>Asunto:</strong> {$msg['asunto']}</p>";
        //echo "<p><strong>Contenido:</strong> {$msg['contenido']}</p>"; NO HACE FALTA MOSTRARLO AQUÍ, SE VERÁ EN VER_MENSAJE.PHP
        echo "<p><strong>Fecha de envío:</strong> {$msg['fecha_envio']}</p>";
        echo "<p><strong>Remitente:</strong> {$msg['remitente']}</p>";
       // echo "<p><strong>Canal:</strong> {$msg['canal']}</p>"; NO HACE FALTA MOSTRARLO AQUÍ, SE VERÁ EN VER_MENSAJE.PHP
        echo "<p><strong>Destinatarios:</strong> {$msg['total_destinatarios']} alumno(s)</p>";

        echo "<a href='ver_mensaje.php?id={$msg['id_mensaje']}'>Ver detalles</a>";

        echo "</div>";
    }
echo "</div>";
} else {
    echo "<p>No hay mensajes enviados todavía.</p>";
}
?>
</div>
</main>

</body>
</html>
