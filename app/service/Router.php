<?php

namespace App\Service;

class Router
{
    private static array $routes = [];

    public static function add(string $method, string $route, callable $callback): void
    {
        self::$routes[] = [
            'method' => strtoupper($method),
            'route' => $route,
            'callback' => $callback
        ];
    }

    public static function redirect(string $route): void
    {
        header("Location: $route");
        die;
    }

    public static function route(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        foreach (self::$routes as $route) {
            if (
                $route['method'] === $method &&
                $route['route'] === $uri
            ) {
                $callback = $route['callback'];
                $callback();
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}
