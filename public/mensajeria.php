<?php
session_start();

// Solo Admin y Empleado pueden ver esta página
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

if ($_SESSION['tipo'] !== 'Admin' && $_SESSION['tipo'] !== 'Empleado') {
    echo "<h2>No tienes permiso para acceder a esta página.</h2>";
    exit;
}

$usuario = $_SESSION['usuario'];
$tipo    = $_SESSION['tipo'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mensajes</title>
    <link rel="stylesheet" href="styles.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<!-- cabecera -->
<header class="cabecera">
    <h1>ESCUELA DE TEATRO</h1>
</header>

<!-- barra lateral -->
<aside class="barra-lateral">

    <a href="index.php" class="icono">
        <i class="fas fa-home"></i>
    </a>

    <a href="mensajeria.php" class="icono activo">
        <i class="fas fa-comment"></i>
    </a>

    <?php if ($tipo === 'Admin') { ?>
        <a href="crear_alumno.php" class="icono">
            <i class="fas fa-users"></i>
        </a>

        <a href="crear_profesor.php" class="icono">
            <i class="fas fa-user-plus"></i>
        </a>
    <?php } ?>

    <a href="historial.php" class="icono">
        <i class="fas fa-file-alt"></i>
    </a>

    <a href="logout.php" class="icono">
        <i class="fas fa-right-from-bracket"></i>
    </a>

</aside>

<!-- contenido principal -->
<main class="contenido">

    <h2>Mensajes</h2>

    <div class="contenido-mensajes">

        <!-- menú izquierdo -->
        <nav class="menu-mensajes">

            <a href="formulario.php" class="opcion-menu">
                <i class="fa-solid fa-pen"></i>
                <span>Nuevo mensaje</span>
            </a>

            <a href="historial.php" class="opcion-menu activo">
                <i class="fa-solid fa-inbox"></i>
                <span>Enviados</span>
            </a>

        </nav>

        <!-- panel derecho -->
        <div class="panel-mensajes">

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

            <!-- lista de mensajes reales -->
            <div class="lista-mensajes">

                <?php
                require __DIR__ . '/../src/conexion.php';

                $sql = "
                    SELECT m.id_mensaje, m.asunto, m.fecha_envio, m.canal
                    FROM mensaje m
                    WHERE m.id_remitente = ?
                    ORDER BY m.fecha_envio DESC
                ";

                $stmt = $conexion->prepare($sql);
                $stmt->bind_param("i", $_SESSION['id_usuario']);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows === 0) {
                    echo "<p>No has enviado mensajes todavía.</p>";
                }

                while ($msg = $result->fetch_assoc()) {
                    echo "
                    <div class='fila-mensaje' onclick=\"location.href='ver_mensaje.php?id={$msg['id_mensaje']}'\">
                        <div class='avatar'></div>
                        <span class='nombre'>{$msg['canal']}</span>
                        <span class='mensaje'>{$msg['asunto']}</span>
                        <div class='mensaje-derecha'>
                            <i class='fa-regular fa-clock'></i>
                            <span>{$msg['fecha_envio']}</span>
                        </div>
                    </div>
                    ";
                }
                ?>

            </div>

        </div>

    </div>

</main>

</body>
</html>
