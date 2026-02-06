<?php

$provider = 'mysql';
$username = '<user_name>';
$password = '<password>';
$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
$config = [
    'host' => '127.0.0.1',
    'port' => '3306',
    'dbname' => '<db_name>',
    'charset' => 'utf8mb4',
];
$dsn = $provider.':'.http_build_query($config, '', ';');

return [
    'database' => [
        'dsn' => $dsn,
        'username' => $username,
        'password' => $password,
        'options' => $options,
    ],
];

