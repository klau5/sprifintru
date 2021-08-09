<?php

require_once '../vendor/autoload.php';

$transport = (new Swift_SmtpTransport('smtp.virgilio.it', 587))
    ->setUsername('mattiacabrini@virgilio.it')
    ->setPassword('Mattia88@');

$mailer = new Swift_Mailer($transport);

// form data
$name = htmlspecialchars($_POST['Name']);
$email = htmlspecialchars($_POST['Email']);
$subject = htmlspecialchars($_POST['Subject']);
$message = htmlspecialchars($_POST['Message']);

// create message
$message = (new Swift_Message('Website Contact Form'))
    ->setFrom(['mattiacabrini@virgilio.it' => 'Web'])
    ->setTo(['info@springfinancetrust.co'])
    ->setBody('<h3>Name: $name <br> Email: $email <br> Subject: $subject <br> Message: $message</h3>');

// send message
$result = $mailer->send($message);
