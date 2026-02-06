<?php


use helpers\App;
use helpers\Database;


try {
    $db = App::resolve(Database::class);
} catch (Exception $e) {
    echo $e->getMessage();
    exit();
}
if (!isset($_SESSION['user'])) {
    redirect('/login');
}

$user = $db->where('users', 'email', $_SESSION['user']['email'], 1)[0];
$notes = $db->where('notes', 'user_id', $user['id']);

view('notes/index.view.php', ['heading' => 'Notes', 'notes' => $notes, 'user' => $user]);