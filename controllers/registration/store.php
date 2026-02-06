<?php

use helpers\App;
use helpers\Database;
use helpers\Validator;

$db = App::resolve(Database::class);

$values = [
    'name' => htmlspecialchars($_POST['name']),
    'email' => htmlspecialchars($_POST['email']),
    'password' => htmlspecialchars($_POST['password'])
];


$errors = [];


if (!Validator::required($values['name'])) {
    $errors['name'] = 'name is required';
}
if (!Validator::email($values['email'])) {
    $errors['email'] = 'must be a valid email';
}

if (!Validator::min($values['password'], 5)) {
    $errors['password'] = 'password must be at least 5 characters';
}

$user = $db->where('users', 'email', $values['email'], 1);

if ($user) {
    $errors['email'] = 'Email already exists';
}

if (!empty($errors)) {
    view('registration/create.view.php', ['errors' => $errors, 'values' => $values]);
}

$db->query('insert into users(name,email,password) values(:name,:email,:password)', [
    'name' => $values['name'],
    'email' => $values['email'],
    'password' => password_hash($values['password'], PASSWORD_DEFAULT),
]);


$_SESSION['user'] = [
    'name' => $values['name'],
    'email' => $values['email']
];

redirect('/notes');

