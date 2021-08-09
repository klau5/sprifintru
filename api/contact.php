<?php

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

// form data
$name = htmlspecialchars($_POST['Name']);
$email = htmlspecialchars($_POST['Email']);
$subject = htmlspecialchars($_POST['Subject']);
$message = htmlspecialchars($_POST['Message']);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'kmvn22@gmail.com';                     //SMTP username
    $mail->Password   = 'ylC8hvAb4@l';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // receipients
    $mail->setFrom('kmvn22@gmail.com');
    $mail->addAddress('info@springfinacetrust.co');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Website Contact Form';
    $mail->Body    = "<h3>Name: $name <br> Email: $email <br> Subject: $subject <br> Message: $message</h3>";

    $mail->send();
    header('Location: ../index.html');
    die();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent: {$mail->ErrorInfo}";
}
