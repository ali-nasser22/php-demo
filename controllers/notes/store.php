<?php


use helpers\App;
use helpers\Database;
use helpers\enums\HttpStatus;
use helpers\Validator;

$heading = 'Where your ideas come true!';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = [];
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
        $stmt = $db->query('insert into notes(body,user_id) values (:body,:userId)',
            [
                'body' => $body,
                'userId' => $user['id'],
            ]
        );

        redirect('/notes');
    }
    view('notes/create.view.php', ['heading' => $heading, 'errors' => $errors]);
}
