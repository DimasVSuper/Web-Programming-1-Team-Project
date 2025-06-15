<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../model/contactProcessing.php';

/**
 * Class ContactController
 *
 * Controller untuk menangani form kontak dan pengiriman pesan dari user.
 */
class ContactController
{
    /**
     * Menampilkan form kontak ke user.
     */
    public static function showForm(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        $csrf_token = $_SESSION['csrf_token'];
        include __DIR__ . '/../view/contact.view.php';
    }

    /**
     * Memproses submit form kontak.
     * - Validasi input.
     * - Simpan pesan ke database.
     * - Set status session untuk notifikasi.
     * - Redirect kembali ke halaman kontak.
     */
    public static function submit(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        // Pastikan request adalah POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: contact');
            exit;
        }

        // Validasi CSRF token
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
            $_SESSION['status']  = 'error';
            $_SESSION['message'] = 'CSRF token tidak valid!';
            header('Location: contact');
            exit;
        }

        // Ambil dan sanitasi data POST
        $name    = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
        $email   = trim(strtolower($_POST['email'] ?? ''));
        $email   = preg_replace('/[^a-z0-9@._-]/', '', $email); // hanya karakter email valid
        $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
        $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');

        // Batasi karakter hanya huruf, angka, spasi, titik, koma, tanda tanya, seru, strip, dan apostrof
        $name    = preg_replace('/[^a-zA-Z0-9 .,\-\'!?]/u', '', $name);
        $subject = preg_replace('/[^a-zA-Z0-9 .,\-\'!?]/u', '', $subject);
        $message = preg_replace('/[^a-zA-Z0-9 .,\-\'!?\r\n]/u', '', $message); // message boleh multi-line

        // Validasi email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['status']  = 'error';
            $_SESSION['message'] = 'Email tidak valid atau mengandung karakter terlarang.';
            header('Location: contact');
            exit;
        }

        // Validasi input menggunakan method di ContactProcessing
        if (!ContactProcessing::validate($name, $email, $subject, $message)) {
            $_SESSION['status']  = 'error';
            $_SESSION['message'] = 'Mohon isi semua kolom dengan benar.';
            header('Location: contact');
            exit;
        }

        // Simpan pesan ke database
        if (ContactProcessing::save($name, $email, $subject, $message)) {
            $_SESSION['status']  = 'success';
            $_SESSION['message'] = 'Pesan berhasil dikirim!';
            // (Opsional) Regenerasi CSRF token setelah submit
            unset($_SESSION['csrf_token']);
        } else {
            $_SESSION['status']  = 'error';
            $_SESSION['message'] = 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi nanti.';
        }

        header('Location: contact');
        exit;
    }
}
