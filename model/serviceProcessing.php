<?php
require_once __DIR__ . '/../config/DB.php';

/**
 * Fungsi untuk menyimpan data service request ke database.
 *
 * @param string $nama Nama pelanggan.
 * @param string $email Email pelanggan.
 * @param string $nama_hp Nama HP pelanggan.
 * @param string $kerusakan Deskripsi kerusakan HP.
 *
 * @return bool True jika berhasil disimpan, false jika gagal.
 */
function saveServiceRequest($nama, $email, $nama_hp, $kerusakan)
{
    $db = new DB();
    $conn = $db->getConnection();
    $sql = "INSERT INTO service_requests (nama, email, nama_hp, kerusakan) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        error_log("Gagal prepare statement: " . $conn->error);
        return false;
    }

    $stmt->bind_param("ssss", $nama, $email, $nama_hp, $kerusakan);
    $result = $stmt->execute();

    if (!$result) {
        error_log("Gagal execute statement: " . $stmt->error);
        $stmt->close();
        $conn->close();
        return false;
    }

    // Ambil ID UUID yang baru dibuat (karena pakai UUID, insert_id tidak bisa dipakai)
    $query = $conn->query("SELECT id FROM service_requests WHERE email='" . $conn->real_escape_string($email) . "' ORDER BY created_at DESC LIMIT 1");
    $row = $query->fetch_assoc();
    $id = $row['id'] ?? false;

    $stmt->close();
    $conn->close();

    return $id;
}