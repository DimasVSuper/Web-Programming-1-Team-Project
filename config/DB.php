<?php

/**
 * Membuat dan mengembalikan koneksi ke database MySQL.
 * @return mysqli Koneksi database aktif
 * @throws Exception Jika koneksi gagal
 */

// var_dump($_ENV); // Debugging: menampilkan semua variabel lingkungan
class DB{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'risscell';
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

}

