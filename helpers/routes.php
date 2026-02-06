<?php


//return [
//    '/' => BASE_PATH.'controllers/home.php',
//    '/about' => BASE_PATH.'controllers/about.php',
//    '/notes' => BASE_PATH.'controllers/notes/index.php',
//    '/note' => BASE_PATH.'controllers/notes/show.php',
//    '/notes/create' => BASE_PATH.'controllers/notes/create.php',
//    '/contact' => BASE_PATH.'controllers/contact.php',
//];

// General Routes
$router->get('/', 'controllers/home.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// Auth routes
$router->get('/register', 'controllers/registration/create.php');
$router->post('/register', 'controllers/registration/store.php');
$router->get('/login', 'controllers/auth/create.php');
$router->post('/login', 'controllers/auth/store.php');
$router->post('/logout', 'controllers/auth/destroy.php');
// Notes Routes
$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->get('/notes/edit', 'controllers/notes/edit.php');
$router->post('/notes', 'controllers/notes/store.php');
$router->patch('/notes/update', 'controllers/notes/update.php');
$router->delete('/notes', 'controllers/notes/destroy.php');
