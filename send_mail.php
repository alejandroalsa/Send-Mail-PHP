<?php
ob_start();
error_reporting(E_ALL);
session_start();
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);
header("Location: index.php");

$contenido = '
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Mensaje</title>
</head>
<body>
    <p><strong>Nombre</strong>: '.$_POST["name"].'</p>
    <p><strong>Apellidos</strong>: '.$_POST["surename"].'</p>
    <p><strong>Usuario</strong>: '.$_POST["user"].'</p>
    <p><strong>Correo Electrónico</strong>: '.$_POST["email"].'</p>
    <p><strong>Teléfono</strong>: '.$_POST["phone_number"].'</p>
    <p><strong>País</strong>: '.$_POST["country"].'</p>
    <p><strong>Mensaje</strong>: '.$_POST["menssage"].'</p>
    <p><strong>Política de Privacidad</strong>: '.$_POST["privacy_policy"].'</p>
</body>
</html>
';

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.###.###';
    $mail->SMTPAuth   = true;
    $mail->Username   = '###@###.###';
    $mail->Password   = '###';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
    $mail->Port       = 465;
                
    $mail->setFrom('###@###.###', 'alejandroalsa.es');
    $mail->addAddress($_POST["email"], 'alejandroalsa.es');
    
    $mail->isHTML(true);
    $mail->Subject = 'Mensaje Recibido';
    $mail->Body    = $contenido;
    $mail->CharSet = 'UTF-8';
    $mail->send();
    
    $_SESSION["flash"] = ["email" => "{$_POST['email']}"];
    
    echo 'Mensaje Recibido';
    ob_end_clean();
    header("Location: index.php");

} catch (Exception $e) {
    echo "No se pudo enviar el mensaje. Error de correo: {$mail->ErrorInfo}";
}
