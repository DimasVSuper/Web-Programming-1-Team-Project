<?php

/**
 * Membuat dan mengembalikan koneksi ke database MySQL.
 * @return mysqli Koneksi database aktif
 * @throws Exception Jika koneksi gagal
 */
function getDBConnection() {
    $host = 'localhost'; // Host database
    $user = 'root';      // Username database
    $pass = '';          // Password database (kosong untuk XAMPP default)
    $dbname = 'risscell'; // Nama database Anda

    // Membuat koneksi
    $mysqli = new mysqli($host, $user, $pass, $dbname);

    // Periksa koneksi
    if ($mysqli->connect_error) {
        // Bisa juga menggunakan Exception untuk error handling yang lebih baik
        die("Koneksi gagal: " . $mysqli->connect_error);
    }
    return $mysqli;
}
?>