<?php
require_once __DIR__ . '/../config/DB.php';

/**
 * Fungsi untuk menyimpan pesan kontak ke database.
 *
 * @param mysqli $conn Koneksi database.
 * @param string $name Nama pengirim.
 * @param string $email Email pengirim.
 * @param string $subject Subjek pesan.
 * @param string $message Isi pesan.
 *
 * @return bool True jika pesan berhasil disimpan, false jika gagal.
 */
function saveContactMessage($conn, $name, $email, $subject, $message)
{
    $sql  = "INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        error_log("Gagal prepare statement: " . $conn->error); // Log error
        return false;
    }

    $stmt->bind_param('ssss', $name, $email, $subject, $message);
    $result = $stmt->execute();

    if (!$result) {
        error_log("Gagal execute statement: " . $stmt->error); // Log error
        $stmt->close();
        return false;
    }

    $stmt->close();
    return $result;
}

/**
 * Fungsi untuk memvalidasi input form kontak.
 *
 * @param string $name Nama pengirim.
 * @param string $email Email pengirim.
 * @param string $subject Subjek pesan.
 * @param string $message Isi pesan.
 *
 * @return bool True jika semua input valid, false jika tidak.
 */
function validateContactInput($name, $email, $subject, $message)
{
    // Validasi dasar: tidak boleh kosong
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        return false;
    }

    // Validasi email: format harus benar
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    return true;
}
