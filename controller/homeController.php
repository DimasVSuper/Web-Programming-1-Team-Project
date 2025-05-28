<?php

/**
 * Class HomeController
 * Controller untuk menangani halaman home.
 */
class HomeController {
    /**
     * Menampilkan halaman home.
     * @return void
     */
    public static function index() {
        include __DIR__ . '/../view/src/home.view.php';
    }
}
