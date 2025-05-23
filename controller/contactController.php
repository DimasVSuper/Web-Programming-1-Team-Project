<?php
require_once __DIR__ . '/../model/contact_processing.php';
require_once __DIR__ . '/../config/DB.php'; // Pastikan koneksi db juga sudah dipanggil

class ContactController {
    public static function showForm() {
        include __DIR__ . '/../view/src/contact.view.php';
    }

    public static function submit() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /projek/contact');
            exit;
        }

        // Ambil data POST
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $subject = trim($_POST['subject'] ?? '');
        $message = trim($_POST['message'] ?? '');

        // Session sudah di-start di index.php, jadi gak perlu di sini lagi
        if (!validateContactInput($name, $email, $subject, $message)) {
            $_SESSION['status'] = 'error';
            header('Location: /projek/contact');
            exit;
        }

        $db = new Database();
        $conn = $db->getConnection();

        if (saveContactMessage($conn, $name, $email, $subject, $message)) {
            $_SESSION['status'] = 'success';
        } else {
            $_SESSION['status'] = 'error';
        }

        header('Location: /projek/contact');
        exit;
    }
}
