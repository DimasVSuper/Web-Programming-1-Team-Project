<?php
require_once __DIR__ . '/../config/DB.php';

/**
 * Menyimpan pesan kontak ke database.
 *
 * @param mysqli $conn
 * @param string $name
 * @param string $email
 * @param string $subject
 * @param string $message
 * @return bool True jika pesan berhasil disimpan, false jika gagal.
 */
function saveContactMessage($conn, $name, $email, $subject, $message)
{
    $sql  = "INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        error_log("Gagal prepare statement: " . $conn->error);
        return false;
    }

    $stmt->bind_param('ssss', $name, $email, $subject, $message);
    $result = $stmt->execute();

    if (!$result) {
        error_log("Gagal execute statement: " . $stmt->error);
        $stmt->close();
        return false;
    }

    $stmt->close();
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
function validateContactInput($name, $email, $subject, $message)
{
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        return false;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}
