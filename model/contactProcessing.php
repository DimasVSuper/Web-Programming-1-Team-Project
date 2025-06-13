<?php
require_once __DIR__ . '/../config/DB.php';

/**
 * Class ContactProcessing
 *
 * Mengelola proses validasi dan penyimpanan pesan kontak dari user.
 */
class ContactProcessing
{
    /**
     * Menyimpan pesan kontak ke database.
     *
     * @param string $name    Nama pengirim.
     * @param string $email   Email pengirim.
     * @param string $subject Subjek pesan.
     * @param string $message Isi pesan.
     * @return bool           True jika pesan berhasil disimpan, false jika gagal.
     */
    public static function save(string $name, string $email, string $subject, string $message): bool
    {
        $db = new DB();
        $pdo = $db->getConnection();
        $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        if (!$stmt) {
            error_log("[ContactProcessing] Gagal prepare statement: " . implode(" | ", $pdo->errorInfo()));
            return false;
        }

        $result = $stmt->execute([$name, $email, $subject, $message]);

        if (!$result) {
            error_log("[ContactProcessing] Gagal execute statement: " . implode(" | ", $stmt->errorInfo()));
            return false;
        }

        return $result;
    }

    /**
     * Validasi input form kontak.
     *
     * @param string $name    Nama pengirim.
     * @param string $email   Email pengirim.
     * @param string $subject Subjek pesan.
     * @param string $message Isi pesan.
     * @return bool           True jika semua input valid, false jika tidak.
     */
    public static function validate(string $name, string $email, string $subject, string $message): bool
    {
        if (
            empty(trim($name)) ||
            empty(trim($email)) ||
            empty(trim($subject)) ||
            empty(trim($message))
        ) {
            return false;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
}
