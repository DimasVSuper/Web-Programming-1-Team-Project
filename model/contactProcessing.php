<?php
require_once __DIR__ . '/../config/DB.php';

class ContactProcessing
{
    /**
     * Menyimpan pesan kontak ke database.
     *
     * @param string $name
     * @param string $email
     * @param string $subject
     * @param string $message
     * @return bool True jika pesan berhasil disimpan, false jika gagal.
     */
    public static function save($name, $email, $subject, $message)
    {
        $db = new DB();
        $pdo = $db->getConnection();
        $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);

        if (!$stmt) {
            error_log("Gagal prepare statement: " . implode(" | ", $pdo->errorInfo()));
            return false;
        }

        $result = $stmt->execute([$name, $email, $subject, $message]);

        if (!$result) {
            error_log("Gagal execute statement: " . implode(" | ", $stmt->errorInfo()));
            return false;
        }

        return $result;
    }

    /**
     * Validasi input form kontak.
     *
     * @param string $name
     * @param string $email
     * @param string $subject
     * @param string $message
     * @return bool True jika semua input valid, false jika tidak.
     */
    public static function validate($name, $email, $subject, $message)
    {
        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            return false;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
}
