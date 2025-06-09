<?php
require_once __DIR__ . '/../config/DB.php';

/**
 * Class ServiceProcessing
 * Mengelola proses penyimpanan dan validasi data service request.
 */
class ServiceProcessing
{
    /**
     * Menyimpan data service request ke database.
     *
     * @param string $nama Nama pelanggan.
     * @param string $email Email pelanggan.
     * @param string $nama_hp Nama HP pelanggan.
     * @param string $kerusakan Deskripsi kerusakan HP.
     * @return string|false ID service request jika berhasil, false jika gagal
     */
    public static function save($nama, $email, $nama_hp, $kerusakan)
    {
        $db = new DB();
        $pdo = $db->getConnection();
        $sql = "INSERT INTO service_requests (nama, email, nama_hp, kerusakan) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        if (!$stmt) {
            error_log("Gagal prepare statement: " . implode(" | ", $pdo->errorInfo()));
            return false;
        }

        $result = $stmt->execute([$nama, $email, $nama_hp, $kerusakan]);

        if (!$result) {
            error_log("Gagal execute statement: " . implode(" | ", $stmt->errorInfo()));
            return false;
        }

        // Ambil ID UUID yang baru dibuat (karena pakai UUID, lastInsertId tidak bisa dipakai)
        $query = $pdo->prepare("SELECT id FROM service_requests WHERE email = ? ORDER BY created_at DESC LIMIT 1");
        $query->execute([$email]);
        $row = $query->fetch();
        $id = $row['id'] ?? false;

        return $id;
    }

    /**
     * Validasi input form service.
     *
     * @param string $nama
     * @param string $email
     * @param string $nama_hp
     * @param string $kerusakan
     * @return bool
     */
    public static function validate($nama, $email, $nama_hp, $kerusakan)
    {
        if (empty($nama) || empty($email) || empty($nama_hp) || empty($kerusakan)) {
            return false;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
}