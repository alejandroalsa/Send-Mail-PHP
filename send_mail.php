<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$contenido = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                </head>
                <body>
                    <p>Nombre: '.$_POST["name"].'</p>
                    <p>E-Mail: '.$_POST["email"].'</p>
                    <p>Telefono: '.$_POST["telefono"].'</p>
                    <p>Mensaje: '.$_POST["mensaje"].'</p>
                </body>
                </html>
            ';


try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.###.###';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '###@###.###';                     //SMTP username
    $mail->Password   = '####';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('###@###.###', 'alejandroalsa.es');
    $mail->addAddress('###@###.###', 'alejandroalsa.es');     //Add a recipient

    //Content
    $mail->isHTML(true);         
                            //Set email format to HTML
    $mail->Subject = 'Ok';
    $mail->Body    = $contenido;
    $mail->CharSet = 'UTF-8';
    $mail->send();
    echo 'Message has been sent';

    header("Location: templante.html");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
