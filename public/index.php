<?php

session_start();

use helpers\Router;

const BASE_PATH = __DIR__.'/../';

require_once BASE_PATH.'/helpers/functions.php';

spl_autoload_register(function ($class) {

    //$class will use namespace so it will use '\' instead of actual file '/' so we need to replace it
    $class = str_replace('\\', '/', $class);

    require_once base_path($class.'.php');
});

require_once base_path('bootstrap.php');

$router = new Router();

require_once base_path('helpers/functions.php');

require_once base_path('helpers/routes.php');

$uri = strtok($_SERVER['REQUEST_URI'], '?');


$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


$router->route($uri, $method);



