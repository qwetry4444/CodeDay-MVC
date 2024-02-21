<?php

namespace App\Kernel\Router;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct() {
        $this->initRoutes();
    }

    public function dispatch(string $uri, string $method): void
    {
        $route = $this->findRoute($uri, $method);

        if (! $route) {
            $this->notFound($uri, $method);
        }

        if (is_array($route->getAction())) { // Если в routes передается контроллер
            [$controller, $action] = $route->getAction();
            $controller = $route->getAction()[0]; // Путь до класса контроллера
            $action = $route->getAction()[1]; // Метод контроллера (обычно req view)

            $controller = new $controller();

            //call_user_func([$controller, 'setView'], $this->view);


            call_user_func([$controller, $action]);
        } else { // Если передатеся анониманая функция
            call_user_func($route->getAction());
        }
    }

    private function notFound(string $uri, string $method): void
    {
        echo '404';
        exit;
    }

    private function findRoute(string $uri, string $method): Route|false
    {
        if (! isset($this->routes[$method][$uri])) {
            return false;
        }

        return $this->routes[$method][$uri];
    }

    private function initRoutes(): void
    {
        $routes = $this->getRoutes();

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }

    private function getRoutes(): array
    {
        return require_once APP_PATH.'/config/routes.php';
    }
}