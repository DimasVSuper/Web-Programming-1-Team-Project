<?php

/**
 * DB.php
 *
 * Kelas DB untuk mengelola koneksi database MySQL menggunakan PDO.
 *
 * @package   projek\config
 * @author    Dimas Bayu Nugroho
 * @copyright (c) 2025
 * @license   MIT
 */

/**
 * Class DB
 *
 * Membuat koneksi ke database MySQL menggunakan PDO.
 */
class DB {
    /**
     * Membuka koneksi ke database MySQL dengan PDO.
     *
     * @return PDO Koneksi PDO yang sudah siap digunakan.
     * @throws PDOException Jika koneksi gagal
     */
    public function getConnection() {
        // Konfigurasi database langsung di sini (tanpa .env)
        $host = 'localhost';
        $db   = 'risscell';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            return new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }
    }
}

