<?php
// Hapus session_start() karena sudah dimulai di index.php
include __DIR__ . '/../config/DB.php'; // Memasukkan file konfigurasi database
$mysqli = getDBConnection(); // Mendapatkan koneksi ke database

// Fungsi untuk menyimpan pesan kontak ke database
function saveContactMessage($mysqli, $id, $name, $email, $subject, $message) {
    $sql = "INSERT INTO contact_messages (id, name, email, subject, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql); // Mempersiapkan statement SQL

    if (!$stmt) {
        return false; // Kembali false jika statement gagal dipersiapkan
    }

    $stmt->bind_param("sssss", $id, $name, $email, $subject, $message); // Mengikat parameter ke statement
    $result = $stmt->execute(); // Menjalankan statement
    $stmt->close(); // Menutup statement

    return $result; // Mengembalikan hasil eksekusi
}

// Fungsi untuk generate UUID v4
function generate_uuid() {
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    ); // Menghasilkan UUID v4
}

// Fungsi validasi input
function validateContactInput($name, $email, $subject, $message) {
    return !(empty($name) || empty($email) || empty($subject) || empty($message)); // Memastikan semua input tidak kosong
}

// Proses hanya jika POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? ''; // Mendapatkan nama dari input POST
    $email = $_POST['email'] ?? ''; // Mendapatkan email dari input POST
    $subject = $_POST['subject'] ?? ''; // Mendapatkan subjek dari input POST
    $message = $_POST['message'] ?? ''; // Mendapatkan pesan dari input POST
    $id = generate_uuid(); // Menghasilkan UUID untuk pesan

    if (!validateContactInput($name, $email, $subject, $message)) {
        $_SESSION['status'] = 'error'; // Menyimpan status error di sesi jika validasi gagal
        header('Location: /projek/contact'); // Redirect ke halaman kontak
        exit();
    }

    if (saveContactMessage($mysqli, $id, $name, $email, $subject, $message)) {
        $_SESSION['status'] = 'success'; // Menyimpan status sukses di sesi jika penyimpanan berhasil
    } else {
        $_SESSION['status'] = 'error'; // Menyimpan status error di sesi jika penyimpanan gagal
    }
    header('Location: /projek/contact'); // Redirect ke halaman kontak
    exit();
} else {
    // Jika bukan POST, redirect ke contact
    $_SESSION['status'] = 'error'; // Menyimpan status error di sesi
    header('Location: /projek/contact'); // Redirect ke halaman kontak
    exit();
}
?>