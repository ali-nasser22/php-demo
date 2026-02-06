<?php


use helpers\Database;
use helpers\enums\HttpStatus;
use JetBrains\PhpStorm\NoReturn;

require_once BASE_PATH.'helpers/enums/HttpStatus.php';


#[NoReturn]
function dd($variable): void
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    die();
}

#[NoReturn]
function abort(int $status_code, string $message = 'Error'): void
{
    http_response_code($status_code);

    view('httpResponse.php', ['error_message' => $message]);

    die();

}

#[NoReturn]
function redirect(string $url): void
{
    header('Location: '.$url);
    exit();
}

function db_connect(): Database
{
    $connection = require_once BASE_PATH.'config.php';
    return new Database($connection['database']);
}

function request_is($url): bool
{
    return $_SERVER['REQUEST_URI'] === $url;
}

//function route_to_controller($routes): void
//{
//    $request_uri = strtok($_SERVER['REQUEST_URI'], '?'); // you can use parse_url(), but this is easier
//
//    if (array_key_exists($request_uri, $routes)) {
//        require_once $routes[$request_uri];
//    } else {
//        abort(HttpStatus::NOT_FOUND->value, HttpStatus::NOT_FOUND->label());
//    }
//}

function authorize(bool $condition, int $status = HttpStatus::FORBIDDEN->value, ?string $message = null): void
{
    if (!$condition) {
        abort($status, $message ?? HttpStatus::from($status)->label());
    }
}

function base_path($path): string
{
    return BASE_PATH.$path;
}

function view($path, $attributes = []): void
{
    extract($attributes);
    require_once base_path('views/'.$path);
}

