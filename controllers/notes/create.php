<?php

if (!isset($_SESSION['user'])) {
    redirect('/login');
}
$heading = 'Where your ideas come true!';

view('notes/create.view.php', ['heading' => $heading]);