<?php

$driver = 'mysql';
$host = 'i54jns50s3z6gbjt.chr7pe7iynqr.eu-west-1.rds.amazonaws.com';
$db_name = 'ghs543luq7tt9xts';
$db_user = 'spha4r7hgv2dlqf7';
$db_pass = 'lbmr1j1u0jcxzovb';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try {
    $pdo = new PDO (
        "$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options
    );
} catch (PDOException $i) {
    die("Ошибка подключения к базе данных");
}