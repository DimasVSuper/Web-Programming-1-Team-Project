<?php

/**
 * Class HomeController
 *
 * Controller untuk menangani tampilan halaman utama (home/beranda).
 */
class HomeController
{
    /**
     * Menampilkan halaman home/beranda.
     *
     * Jika di masa depan membutuhkan data dari database,
     * cukup tambahkan require DB.php dan query di sini.
     */
    public static function index(): void
    {
        // Tidak perlu baseUrl, cukup include view langsung
        include __DIR__ . '/../view/home.view.php';
    }
}
