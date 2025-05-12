<!-- filepath: c:\xampp\htdocs\project\database\contactDB.php -->
<?php
$host = 'localhost'; // Host database
$user = 'root';      // Username database
$pass = '';          // Password database (kosong untuk XAMPP default)
$dbname = 'risscell'; // Nama database Anda

// Membuat koneksi
$mysqli = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi
if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}
?>