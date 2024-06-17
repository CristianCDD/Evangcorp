<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PhpMailer/Exception.php';

require 'PhpMailer/PHPMailer.php';
require 'PhpMailer/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Deshabilitar salida detallada de depuración
    $mail->isSMTP();                                         // Enviar usando SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Establecer el servidor SMTP para enviar
    $mail->SMTPAuth   = true;                                // Habilitar autenticación SMTP
    $mail->Username   = 'cristian10damian@gmail.com';        // Nombre de usuario SMTP
    $mail->Password   = 'zzatnchfpiyhgfnz';                  // Contraseña SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Habilitar encriptación TLS implícita
    $mail->Port       = 465;                                 // Puerto TCP para conectarse; use 587 si ha configurado `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Destinatarios
    $mail->setFrom('cristian10damian@gmail.com', 'Cristian');
    $mail->addAddress('nolsolano23@gmail.com');              // Añadir un destinatario
   
    // Contenido
    $mail->isHTML(true);                                     // Establecer el formato de correo a HTML
    $mail->Subject = 'Asunto importante';
    $mail->Body    = 'Mensaje correo prueba';

    $mail->send();
    echo 'Mensaje enviado correctamente';
} catch (Exception $e) {
    echo "Hubo un error al enviar un mensaje: {$mail->ErrorInfo}";
}
