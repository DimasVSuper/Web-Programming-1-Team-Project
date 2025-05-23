<?php
class Router {
    private $routes = [];

    // Daftarkan route baru
    public function add(string $method, string $path, callable $handler) {
        $method = strtoupper($method);
        $this->routes[$method][$path] = $handler;
    }

    // Shortcut untuk GET route
    public function get(string $path, callable $handler) {
        $this->add('GET', $path, $handler);
    }

    // Shortcut untuk POST route
    public function post(string $path, callable $handler) {
        $this->add('POST', $path, $handler);
    }

    // Render halaman 404 dari file view yang sudah dibuat
    private function render404() {
        http_response_code(404);
        include __DIR__ . '/../view/src/404.view.php';  // sesuaikan path ke file 404.view.php
    }

    // Jalankan router, cocokkan path & method, lalu panggil handler
    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Base folder aplikasi kamu, misal: /projek
        $basePath = '/projek';  // ubah sesuai nama folder atau '' jika di root
        if ($basePath !== '' && strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }
        if ($uri === '') $uri = '/';

        if (isset($this->routes[$method][$uri])) {
            call_user_func($this->routes[$method][$uri]);
        } else {
            $this->render404();
        }
    }
}
