<?php

class Router {
    private $routes = [];

    // REGISTER A ROUTE
    public function addRoute($method, $route, $callback) {
        $this->routes[] = [
            'method' => strtoupper($method),
            'route' => $route,
            'callback' => $callback
        ];
    }

    // PROCESS THE REQUEST
    public function resolve() {
        $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['route'] === $uri) {
                call_user_func($route['callback']);
                return;
            }
        }

        // IF NO ROUTE MATCHES
        echo "404 - NOT FOUND";
    }
}
