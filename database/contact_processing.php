<?php
// Hapus session_start() karena sudah dimulai di index.php
include __DIR__ . '/contactDB.php'; // Gunakan path absolut

// Pastikan output berupa JSON
header('Content-Type: application/json; charset=utf-8');

// Pastikan metode request adalah POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['status'] = 'error';
    header('Location: ?page=contact');
    exit();
}

// Ambil data dari form
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

// Validasi input
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    $_SESSION['status'] = 'error';
    header('Location: ?page=contact');
    exit();
}

// Query untuk menyimpan data
$sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    $_SESSION['status'] = 'error';
    header('Location: ?page=contact');
    exit();
}

$stmt->bind_param("ssss", $name, $email, $subject, $message);

if ($stmt->execute()) {
    $_SESSION['status'] = 'success';
} else {
    $_SESSION['status'] = 'error';
}

$stmt->close();
// Setelah proses form, redirect ke halaman kontak
header('Location: ?page=contact');
exit();
?>