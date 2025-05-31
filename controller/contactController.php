<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../model/contactProcessing.php';

/**
 * Class ContactController
 * Controller untuk menangani form kontak dan pengiriman pesan.
 */
class ContactController
{
    /**
     * Menampilkan form kontak.
     *
     * @return void
     */
    public static function showForm()
    {
        include __DIR__ . '/../view/src/contact.view.php';
    }

    /**
     * Memproses submit form kontak.
     * Validasi input, simpan pesan ke database, dan set status session.
     *
     * @return void
     */
    public static function submit()
    {
        session_start();

        // Pastikan request adalah POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /projek/contact');
            exit;
        }

        // Ambil dan bersihkan data POST
        $name    = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING) ?? '');
        $email   = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '');
        $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING) ?? '');
        $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING) ?? '');

        // Validasi input
        if (!validateContactInput($name, $email, $subject, $message)) {
            $_SESSION['status']  = 'error';
            $_SESSION['message'] = 'Mohon isi semua kolom dengan benar.';
            header('Location: /projek/contact');
            exit;
        }

        // Simpan pesan ke database
        $db   = new DB();
        $conn = $db->getConnection();

        if (saveContactMessage($conn, $name, $email, $subject, $message)) {
            $_SESSION['status']  = 'success';
            $_SESSION['message'] = 'Pesan berhasil dikirim!';
        } else {
            $_SESSION['status']  = 'error';
            $_SESSION['message'] = 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi nanti.';
        }

        header('Location: /projek/contact');
        exit;
    }
}
