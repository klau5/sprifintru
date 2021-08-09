<?php

require_once '../vendor/autoload.php';

$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587))
    ->setUsername('kmvn22@gmail.com')
    ->setPassword('ylC8hvAb4@l');

$mailer = new Swift_Mailer($transport);

// form data
$name = htmlspecialchars($_POST['Name']);
$email = htmlspecialchars($_POST['Email']);
$subject = htmlspecialchars($_POST['Subject']);
$message = htmlspecialchars($_POST['Message']);

// create message
$message = (new Swift_Message('Website Contact Form'))
    ->setFrom(['kmvn22@gmail.com' => 'Web'])
    ->setTo(['info@springfinancetrust.co'])
    ->setBody('<h3>Name: $name <br> Email: $email <br> Subject: $subject <br> Message: $message</h3>');

// send message
$result = $mailer->send($message);
