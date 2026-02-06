<?php

use helpers\App;
use helpers\Database;
use helpers\Validator;

$db = App::resolve(Database::class);

$values = [
    'email' => htmlspecialchars($_POST['email']),
    'password' => htmlspecialchars($_POST['password'])
];


$errors = [];

if (!Validator::email($values['email'])) {
    $errors['email'] = 'must be a valid email';
}

if (!Validator::min($values['password'], 5)) {
    $errors['password'] = 'password must be at least 5 characters';
}


if (!empty($errors)) {
    view('auth/create.view.php', ['errors' => $errors, 'values' => $values]);
}

$user = $db->where('users', 'email', $values['email'], 1)[0];
if (!$user) {
    $errors['email'] = 'Bad Credentials';
    view('auth/create.view.php', ['errors' => $errors, 'values' => $values]);
    exit();
}

if (!password_verify($values['password'], $user['password'])) {
    $errors['email'] = 'Bad Credentials';
    view('auth/create.view.php', ['errors' => $errors, 'values' => $values]);
} else {

    $_SESSION['user'] = [
        'name' => $user['name'],
        'email' => $user['email']
    ];

    redirect('/notes');
}


