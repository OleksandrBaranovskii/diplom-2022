<?php

$from = '<atelier.ua>';
$sendTo = '<dobriden223@gmail.com>';


$subject = 'Заявка с сайта';
$fields = array('name' => 'Имя', 'email' => 'E-mail', 'telephone' => 'Телефон', 'message' => 'Сообщение'); 

$okMessage = 'Ваша заявка була успішно надіслана.';

$errorMessage = 'Під час надсилання форми сталася помилка.';


error_reporting(E_ALL & ~E_NOTICE);

try
{

    if(count($_POST) == 0) throw new \Exception('Form is empty');

    foreach ($_POST as $key => $value) {
        
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    
    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
    );
    
    
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}


if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}

else {
    echo $responseArray['message'];
}
