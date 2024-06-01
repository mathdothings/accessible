<?php

namespace App\Router;

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

    public static function redirect(string $route, int $httpResponseCode = 0): void
    {
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header(header: "Location: $route", response_code: $httpResponseCode);
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
