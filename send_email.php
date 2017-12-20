<?php

require_once 'vendor/autoload.php';

$transport = (new Swift_SmtpTransport('smtp.google.com', 465))
    ->setUsername(getenv('SMTP_USERNAME'))
    ->setPassword(getenv('SMTP_PASSWORD'));

$mailer = new Swift_Mailer($transport);

$mail = (new Swift_Message('Formulier verzonden'))
    ->setFrom(['info@voetbalmateriaal.com' => 'Expo Line'])
    ->setTo('maarten.scholz@gmail.com')
    ->setBody(implode('; ', $_POST));

$mailer->send($mail);

header('location: /');
