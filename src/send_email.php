<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Cargar PHPMailer
require __DIR__ . '/PHPMailer/PHPMailer.php';
require __DIR__ . '/PHPMailer/SMTP.php';
require __DIR__ . '/PHPMailer/Exception.php';

function enviarEmail($destinatario, $asunto, $mensaje)
{
    // Cargar configuración (email.php está en la MISMA carpeta)
    $config = require __DIR__ . '/email.php';

    if (!$config || !is_array($config)) {
        error_log("Error: email.php no devolvió un array válido.");
        return false;
    }

    if (empty($destinatario)) {
        error_log("Error: destinatario vacío.");
        return false;
    }

    $mail = new PHPMailer(true);

    try {
        // Configuración SMTP
        $mail->isSMTP();
        $mail->Host       = $config['host'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $config['username'];
        $mail->Password   = $config['password'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = $config['port'];

        // Charset
        $mail->CharSet = 'UTF-8';

        // Remitente
        $mail->setFrom($config['from_email'], $config['from_name']);

        // Destinatario
        $mail->addAddress($destinatario);

        // Contenido
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body    = nl2br($mensaje);
        $mail->AltBody = $mensaje;

        $mail->send();
        return true;

    } catch (Exception $e) {
        error_log("Error enviando email: {$mail->ErrorInfo}");
        return false;
    }
}

