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
        // Ambil path dari parameter page jika ada (karena .htaccess rewrite)
        $uri = isset($_GET['page']) ? '/' . trim($_GET['page'], '/') : '/';

        if (isset($this->routes[$method][$uri])) {
            call_user_func($this->routes[$method][$uri]);
        } else {
            $this->render404();
        }
    }
}
