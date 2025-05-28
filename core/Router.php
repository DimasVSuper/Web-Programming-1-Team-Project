<?php
class Router {
    private $routes = []; // Array untuk menyimpan semua route yang terdaftar

    // Daftarkan route baru
<<<<<<< HEAD
    public function add(string $method, string $path, callable $handler) {
        $method = strtoupper($method); // Ubah method menjadi huruf besar untuk konsistensi
        $this->routes[$method][$path] = $handler; // Simpan handler berdasarkan method dan path
    }

    // Shortcut untuk GET route
    public function get(string $path, callable $handler) {
        $this->add('GET', $path, $handler); // Daftarkan route dengan method GET
    }

    // Shortcut untuk POST route
    public function post(string $path, callable $handler) {
        $this->add('POST', $path, $handler); // Daftarkan route dengan method POST
=======
    public function add(string $method, string $path,  $handler) {
        $method = strtoupper($method);
        $this->routes[$method][$path] = $handler;
    }

    // Shortcut untuk GET route
    public function get(string $path,  $handler) {
        $this->add('GET', $path, $handler);
    }

    // Shortcut untuk POST route
    public function post(string $path,  $handler) {
        $this->add('POST', $path, $handler);
>>>>>>> development
    }

    // Render halaman 404 dari file view yang sudah dibuat
    private function render404() {
        http_response_code(404); // Set kode respon HTTP ke 404
        include __DIR__ . '/../view/src/404.view.php';  // Sertakan file view untuk halaman 404
    }

    // Jalankan router, cocokkan path & method, lalu panggil handler
    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD']; // Dapatkan method HTTP dari request
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Dapatkan path URI dari request

        // Base folder aplikasi kamu, misal: /projek
        $basePath = '/projek';  // Ubah sesuai nama folder atau '' jika di root
        if ($basePath !== '' && strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath)); // Hilangkan base path dari URI
        }
        if ($uri === '') $uri = '/'; // Set URI ke root jika kosong

        if (isset($this->routes[$method][$uri])) {
            call_user_func($this->routes[$method][$uri]); // Panggil handler jika route ditemukan
        } else {
            $this->render404(); // Tampilkan halaman 404 jika route tidak ditemukan
        }
    }
}
