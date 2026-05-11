<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../public/login.php");
    exit;
}

require __DIR__ . '/../src/conexion.php';
require __DIR__ . '/../src/send_email.php'; // Cargar función UNA sola vez

// Datos del formulario
$grupo_id  = intval($_POST['grupo_id'] ?? 0);
$asunto    = trim($_POST['asunto'] ?? '');
$contenido = trim($_POST['mensaje'] ?? '');
$canal     = trim($_POST['canal'] ?? '');

$idRemitente = $_SESSION['id_usuario'];

// Validación básica
if ($grupo_id <= 0 || $asunto === '' || $contenido === '' || $canal === '') {
    die("Error: Datos incompletos.");
}

// 1. Insertar mensaje
$sqlMsg = "INSERT INTO mensaje (asunto, contenido, fecha_envio, id_remitente, canal)
           VALUES (?, ?, NOW(), ?, ?)";

$stmt = $conexion->prepare($sqlMsg);
$stmt->bind_param("ssis", $asunto, $contenido, $idRemitente, $canal);
$stmt->execute();

if ($stmt->error) {
    die("Error al insertar mensaje: " . $stmt->error);
}

$idMensaje = $stmt->insert_id;

// 2. Obtener alumnos destinatarios
$alumnos = [];

if (isset($_POST['enviar_todos'])) {

    $sql = "
        SELECT a.id_alumno, a.email, a.telefono
        FROM alumnos a
        INNER JOIN alumnos_grupo ag ON a.id_alumno = ag.alumno_id
        WHERE ag.grupo_id = ?
    ";

    $stmt2 = $conexion->prepare($sql);
    $stmt2->bind_param("i", $grupo_id);
    $stmt2->execute();
    $alumnos = $stmt2->get_result();

} else {

    $seleccionados = $_POST['alumnos'] ?? [];

    if (empty($seleccionados)) {
        die("Error: No seleccionaste ningún alumno.");
    }

    $placeholders = implode(",", array_fill(0, count($seleccionados), "?"));
    $types = str_repeat("i", count($seleccionados));

    $sql = "SELECT id_alumno, email, telefono FROM alumnos WHERE id_alumno IN ($placeholders)";
    $stmt2 = $conexion->prepare($sql);
    $stmt2->bind_param($types, ...$seleccionados);
    $stmt2->execute();
    $alumnos = $stmt2->get_result();
}

if ($alumnos->num_rows === 0) {
    die("Error: No hay alumnos en este grupo.");
}

$telefonos = [];

// 3. Insertar destinatarios y enviar mensajes
while ($al = $alumnos->fetch_assoc()) {

    $idAlumno     = $al['id_alumno'];
    $emailDestino = $al['email'];
    $telefono     = $al['telefono'];

    if (!empty($telefono)) {
        $telefonos[] = $telefono;
    }

    // Insertar destinatario
    $sqlDest = "INSERT INTO mensaje_destinatario (mensaje_id, id_destinatario, estado_envio)
                VALUES (?, ?, 'Enviado')";
    $stmt3 = $conexion->prepare($sqlDest);
    $stmt3->bind_param("ii", $idMensaje, $idAlumno);
    $stmt3->execute();

    // Enviar email
    if ($canal === "Email") {
        enviarEmail($emailDestino, $asunto, $contenido);
    }
}

// 4. WhatsApp
if ($canal === "WhatsApp") {

    $mensajeCodificado = urlencode($contenido);

    // Solo un alumno → abrir conversación directa
    if (count($telefonos) === 1) {
        $numero = $telefonos[0];

        echo "<script>window.open('https://wa.me/$numero?text=$mensajeCodificado', '_blank');</script>";
        echo "WhatsApp Web abierto. Mensaje enviado.";
        exit;
    }

    // Varios alumnos → mostrar mensaje y lista
    if (count($telefonos) > 1) {

        echo "<script>window.open('https://web.whatsapp.com/send?text=$mensajeCodificado', '_blank');</script>";

        echo "WhatsApp Web abierto.<br>";
        echo "Como has seleccionado varios alumnos, debes enviar el mensaje manualmente.<br><br>";

        echo "Mensaje a enviar:<br>";
        echo nl2br(htmlspecialchars($contenido)) . "<br><br>";

        echo "Números de los alumnos:<br>";
        foreach ($telefonos as $t) {
            echo $t . "<br>";
        }

        exit;
    }
}

// 5. Redirección final para Email
header("Location: ../public/historial.php?ok=mensaje");
exit;
