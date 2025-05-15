<?php
// Hapus session_start() karena sudah dimulai di index.php
include __DIR__ . '/../config/DB.php';
$mysqli = getDBConnection();

// Fungsi untuk menyimpan pesan kontak ke database
function saveContactMessage($mysqli, $id, $name, $email, $subject, $message) {
    $sql = "INSERT INTO contact_messages (id, name, email, subject, message) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        return false;
    }

    $stmt->bind_param("sssss", $id, $name, $email, $subject, $message);
    $result = $stmt->execute();
    $stmt->close();

    return $result;
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
    );
}

// Fungsi validasi input
function validateContactInput($name, $email, $subject, $message) {
    return !(empty($name) || empty($email) || empty($subject) || empty($message));
}

// Proses hanya jika POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $subject = $_POST['subject'] ?? '';
    $message = $_POST['message'] ?? '';
    $id = generate_uuid();

    if (!validateContactInput($name, $email, $subject, $message)) {
        $_SESSION['status'] = 'error';
        header('Location: ?page=contact');
        exit();
    }

    if (saveContactMessage($mysqli, $id, $name, $email, $subject, $message)) {
        $_SESSION['status'] = 'success';
    } else {
        $_SESSION['status'] = 'error';
    }
    header('Location: ?page=contact');
    exit();
} else {
    // Jika bukan POST, redirect ke contact
    $_SESSION['status'] = 'error';
    header('Location: ?page=contact');
    exit();
}
?>