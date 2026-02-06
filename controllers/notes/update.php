<?php

if (!isset($_SESSION['user'])) {
    redirect('/login');
}

use helpers\App;
use helpers\Database;
use helpers\enums\HttpStatus;
use helpers\Validator;

$errors = [];
try {
    $db = App::resolve(Database::class);
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}
$note = $db->find('notes', $_POST['id']);
$user = $db->where('users', 'email', $_SESSION['user']['email'], 1)[0];
if (!$user) {
    abort(HttpStatus::FORBIDDEN->value);
}
authorize($note['user_id'] === $user['id']);
$body = htmlspecialchars($_POST['body']);
if (!Validator::required($body)) {
    $errors['body'] = 'A body is required';
} else {
    if (!Validator::min($body, 3)) {
        $errors['body'] = 'min body should be at least 3 characters';
    }
    if (!Validator::max($body, 255)) {
        $errors['body'] = 'max body should be 255 characters';
    }
}

if (empty($errors)) {
    $stmt = $db->query('update notes set body =:body where id = :id and user_id = :userId',
        [
            'id' => $_POST['id'],
            'body' => $body,
            'userId' => $user['id'],
        ]
    );

    redirect('/notes');
}
view('notes/edit.view.php', ['note' => $note, 'errors' => $errors]);

