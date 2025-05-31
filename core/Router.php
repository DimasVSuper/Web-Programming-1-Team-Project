<?php
/**
 * Class Router
 * Router sederhana untuk menangani route GET dan POST.
 */
class Router {
    /**
     * @var array $routes Menyimpan semua route yang terdaftar
     */
    private $routes = [];

    /**
     * Daftarkan route baru.
     * @param string $method HTTP method (GET, POST, dll)
     * @param string $path Path/URI
     * @param callable $handler Handler untuk route
     */
    public function add(string $method, string $path, $handler) {
        $method = strtoupper($method);
        $this->routes[$method][$path] = $handler;
    }

    /**
     * Shortcut untuk route GET.
     * @param string $path
     * @param callable $handler
     */
    public function get(string $path, $handler) {
        $this->add('GET', $path, $handler);
    }

    /**
     * Shortcut untuk route POST.
     * @param string $path
     * @param callable $handler
     */
    public function post(string $path, $handler) {
        $this->add('POST', $path, $handler);
    }

    /**
     * Render halaman 404.
     * @return void
     */
    private function render404() {
        http_response_code(404);
        include __DIR__ . '/../view/src/404.view.php';
    }

    /**
     * Jalankan router, cocokkan path & method, lalu panggil handler.
     * @return void
     */

public function dispatch() {
    $method = $_SERVER['REQUEST_METHOD'];
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Potong base path (misalnya '/projek')
    $basePath = '/projek'; // GANTI jika nama folder kamu berbeda
    if (strpos($uri, $basePath) === 0) {
        $uri = substr($uri, strlen($basePath));
    }

    // Normalisasi path
    if ($uri === '' || $uri === false) {
        $uri = '/';
    } elseif ($uri[0] !== '/') {
        $uri = '/' . $uri;
    }

    // Hilangkan debug di production
    // echo "METHOD: $method<br>URI: $uri<br>";

    if (isset($this->routes[$method][$uri])) {
        call_user_func($this->routes[$method][$uri]);
    } else {
        $this->render404();
    }
}

}


