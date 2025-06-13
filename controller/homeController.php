<?php

/**
 * Class HomeController
 *
 * Controller untuk menangani tampilan halaman utama (home/beranda).
 *
 * @package projek\controller
 */
class HomeController
{
    /**
     * Menampilkan halaman home/beranda.
     *
     * Jika di masa depan membutuhkan data dari database,
     * cukup tambahkan require DB.php dan query di sini.
     *
     * @return void
     */
    public static function index(): void
    {
        include __DIR__ . '/../view/home.view.php';
    }
}
