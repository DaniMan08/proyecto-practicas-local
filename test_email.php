<?php

require __DIR__ . '/../src/send_email.php';

$destinatario = "TU_CORREO_REAL@gmail.com";  // cámbialo por tu correo
$asunto = "Prueba de correo";
$mensaje = "Este es un mensaje de prueba enviado desde PHPMailer.";

if (enviarEmail($destinatario, $asunto, $mensaje)) {
    echo "Correo enviado correctamente.";
} else {
    echo "Error al enviar el correo.";
}

?>
