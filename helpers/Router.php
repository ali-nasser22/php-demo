<?php

namespace helpers;

use helpers\enums\HttpStatus;
use JetBrains\PhpStorm\NoReturn;

class Router
{
    protected array $routes = [];

    public function get($uri, $controller): void
    {
        $this->add($uri, $controller, 'GET');
    }

    protected function add($uri, $controller, $method): void
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function post($uri, $controller): void
    {
        $this->add($uri, $controller, 'POST');
    }

    public function patch($uri, $controller): void
    {
        $this->add($uri, $controller, 'PATCH');
    }

    public function put($uri, $controller): void
    {
        $this->add($uri, $controller, 'PUT');
    }

    public function delete($uri, $controller): void
    {
        $this->add($uri, $controller, 'DELETE');
    }

    #[NoReturn]
    public function route($uri, $method): void
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                require_once base_path($route['controller']);
                die();
            }
        }
        abort(HttpStatus::NOT_FOUND->value, HttpStatus::NOT_FOUND->label());
    }
}
