<?php


use helpers\App;
use helpers\Database;
use helpers\enums\HttpStatus;

$id = $_GET['id'];

$db = App::resolve(Database::class);

$note = $db->findOrFail('notes', $id);
$user = $db->where('users', 'email', $_SESSION['user']['email'], 1)[0];
if (!$user) {
    abort(HttpStatus::FORBIDDEN->value);
}

authorize($note['user_id'], $user['id']);

view('notes/edit.view.php', ['note' => $note, 'user' => $user]);