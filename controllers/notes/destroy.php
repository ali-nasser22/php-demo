<?php


use helpers\App;
use helpers\Database;
use helpers\enums\HttpStatus;

try {
    $db = App::resolve(Database::class);
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}

$user = $db->where('users', 'email', $_SESSION['user']['email'], 1)[0];
if (!$user) {
    abort(HttpStatus::FORBIDDEN->value);
}

$note = $db->find('notes', $_POST['id']);
authorize($note['user_id'] === $user['id']);

$db->query('delete from notes where id = :id', ['id' => $_POST['id']]);

redirect('/notes');


