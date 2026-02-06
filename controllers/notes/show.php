<?php


use helpers\App;
use helpers\Database;
use helpers\enums\HttpStatus;


require_once BASE_PATH.'helpers/enums/HttpStatus.php';

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
$note = $db->findOrFail('notes', $_GET['id']);

authorize($note['user_id'] === $user['id'], HttpStatus::NOT_FOUND->value);

view('notes/show.view.php', ['note' => $note, 'user' => $user]);

