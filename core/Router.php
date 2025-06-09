<?php
/**
 * Router.php
 *
 * Router sederhana untuk menangani route GET dan POST pada aplikasi MVC.
 *
 * @package   projek\core
 * @author    Dimas Bayu Nugroho
 * @copyright (c) 2025
 * @license   MIT
 */

/**
 * Class Router
 *
 * Mengelola pendaftaran dan eksekusi route (GET, POST) serta menampilkan halaman 404 jika route tidak ditemukan.
 */
class Router {
    /**
     * @var array $routes Menyimpan semua route yang terdaftar, dikelompokkan berdasarkan method HTTP.
     */
    private $routes = [];

    /**
     * Daftarkan route baru.
     *
     * @param string   $method  HTTP method (GET, POST, dll)
     * @param string   $path    Path/URI yang akan di-handle
     * @param callable $handler Fungsi/callback yang akan dijalankan jika route cocok
     * @return void
     */
    public function add(string $method, string $path, $handler) {
        $method = strtoupper($method);
        $this->routes[$method][$path] = $handler;
    }

    /**
     * Shortcut untuk mendaftarkan route GET.
     *
     * @param string   $path    Path/URI yang akan di-handle
     * @param callable $handler Fungsi/callback yang akan dijalankan jika route cocok
     * @return void
     */
    public function get(string $path, $handler) {
        $this->add('GET', $path, $handler);
    }

    /**
     * Shortcut untuk mendaftarkan route POST.
     *
     * @param string   $path    Path/URI yang akan di-handle
     * @param callable $handler Fungsi/callback yang akan dijalankan jika route cocok
     * @return void
     */
    public function post(string $path, $handler) {
        $this->add('POST', $path, $handler);
    }

    /**
     * Render halaman 404 jika route tidak ditemukan.
     *
     * @return void
     */
    private function render404() {
        http_response_code(404);
        include __DIR__ . '/../view/src/404.view.php';
    }

    /**
     * Jalankan router: cocokkan path & method, lalu panggil handler yang sesuai.
     * Jika tidak ada yang cocok, tampilkan halaman 404.
     *
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

        if (isset($this->routes[$method][$uri])) {
            call_user_func($this->routes[$method][$uri]);
        } else {
            $this->render404();
        }
    }
}


