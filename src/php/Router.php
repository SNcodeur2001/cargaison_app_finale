<?php
// src/php/Router.php

class Router {
    private array $routes = [];

    public function get(string $path, string $view) {
        $this->routes['GET'][$path] = $view;
    }

    public function post(string $path, string $view) {
        $this->routes['POST'][$path] = $view;
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/') ?: '/';
        $view = $this->routes[$method][$path] ?? '404';

        if (str_starts_with($view, 'api/')) {
            $this->handleApi($view);
        } else {
            $this->renderView($view);
        }
    }

    private function renderView(string $view) {
        $file = __DIR__ . '/../../public/views/' . $view . '.php';

        if (file_exists($file)) {
            ob_start();
            require $file;
            $content = ob_get_clean();

            $layout = __DIR__ . '/../../public/views/layout.php';
            if (file_exists($layout)) {
                require $layout;
            } else {
                echo $content;
            }
        } else {
            $this->render404();
        }
    }

    private function handleApi(string $endpoint) {
        header('Content-Type: application/json');
        switch ($endpoint) {
            case 'api/tracking':
                echo json_encode(['message' => 'Tracking simulation']);
                break;
            default:
                http_response_code(404);
                echo json_encode(['error' => 'API endpoint not found']);
        }
    }

    private function render404() {
        http_response_code(404);
        $file = __DIR__ . '/../../public/views/404.php';

        if (file_exists($file)) {
            ob_start();
            require $file;
            $content = ob_get_clean();
            require __DIR__ . '/../../public/views/layout.php';
        } else {
            echo "<h1>404 - Page non trouvée</h1>";
        }
    }
}
