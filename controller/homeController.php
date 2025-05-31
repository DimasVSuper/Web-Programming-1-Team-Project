<?php

/**
 * Class HomeController
 * Controller untuk menangani halaman home.
 */
class HomeController
{
    /**
     * Menampilkan halaman home.
     * @return void
     */
    public static function index()
    {
        // Jika nanti butuh data dari DB, tinggal require DB.php di sini
        // require_once __DIR__ . '/../config/DB.php';
        include __DIR__ . '/../view/src/home.view.php';
    }
}
