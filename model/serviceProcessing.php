<?php
require_once __DIR__ . '/../config/DB.php';

/**
 * Class ServiceProcessing
 *
 * Mengelola proses validasi dan penyimpanan data permintaan service HP.
 */
class ServiceProcessing
{
    /**
     * Menyimpan data permintaan service ke database.
     *
     * @param string $nama      Nama pelanggan.
     * @param string $email     Email pelanggan.
     * @param string $nama_hp   Nama HP pelanggan.
     * @param string $kerusakan Deskripsi kerusakan HP.
     * @return string|false     ID service request (UUID) jika berhasil, false jika gagal.
     */
    public static function save(string $nama, string $email, string $nama_hp, string $kerusakan)
    {
        try {
            $db = new DB();
            $pdo = $db->getConnection();

            $sql = "INSERT INTO service_requests (nama, email, nama_hp, kerusakan) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);

            if (!$stmt) {
                error_log("[ServiceProcessing] Gagal prepare statement: " . implode(" | ", $pdo->errorInfo()));
                return false;
            }

            $result = $stmt->execute([$nama, $email, $nama_hp, $kerusakan]);
            if (!$result) {
                error_log("[ServiceProcessing] Gagal execute statement: " . implode(" | ", $stmt->errorInfo()));
                return false;
            }

            // Ambil ID UUID yang baru dibuat (karena pakai UUID, lastInsertId tidak bisa dipakai)
            $query = $pdo->prepare("SELECT id FROM service_requests WHERE email = ? ORDER BY created_at DESC LIMIT 1");
            $query->execute([$email]);
            $row = $query->fetch();
            return $row['id'] ?? false;
        } catch (\PDOException $e) {
            error_log("[ServiceProcessing] PDOException: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Validasi input form service.
     *
     * @param string $nama      Nama pelanggan.
     * @param string $email     Email pelanggan.
     * @param string $nama_hp   Nama HP pelanggan.
     * @param string $kerusakan Deskripsi kerusakan HP.
     * @return bool             True jika valid, false jika tidak.
     */
    public static function validate(string $nama, string $email, string $nama_hp, string $kerusakan): bool
    {
        if (
            empty(trim($nama)) ||
            empty(trim($email)) ||
            empty(trim($nama_hp)) ||
            empty(trim($kerusakan))
        ) {
            return false;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        // Optional: Batasi panjang field
        if (
            strlen($nama) > 100 ||
            strlen($email) > 100 ||
            strlen($nama_hp) > 100 ||
            strlen($kerusakan) > 1000
        ) {
            return false;
        }
        return true;
    }
}