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
    public static function showForm()
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
     * - Mendukung AJAX (JSON response) dan non-AJAX (redirect).
     */
    public static function submit()
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';

        // Pastikan request adalah POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return self::handleResponse($isAjax, 'error', 'Metode tidak diizinkan.', 'contact');
        }

        // Validasi CSRF token
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
            return self::handleResponse($isAjax, 'error', 'CSRF token tidak valid!', 'contact');
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
            return self::handleResponse($isAjax, 'error', 'Email tidak valid atau mengandung karakter terlarang.', 'contact');
        }

        // Validasi input menggunakan method di ContactProcessing
        if (!ContactProcessing::validate($name, $email, $subject, $message)) {
            return self::handleResponse($isAjax, 'error', 'Mohon isi semua kolom dengan benar.', 'contact');
        }

        // Simpan pesan ke database
        if (ContactProcessing::save($name, $email, $subject, $message)) {
            unset($_SESSION['csrf_token']);
            return self::handleResponse($isAjax, 'success', 'Pesan berhasil dikirim!', 'contact');
        } else {
            return self::handleResponse($isAjax, 'error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi nanti.', 'contact');
        }
    }

    /**
     * Helper untuk response JSON (AJAX) atau session+redirect (non-AJAX).
     */
    private static function handleResponse(bool $isAjax, string $status, string $message, string $redirect)
    {
        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode(['status' => $status, 'message' => $message]);
            exit;
        } else {
            $_SESSION['status']  = $status;
            $_SESSION['message'] = $message;
            header('Location: ' . $redirect);
            exit;
        }
    }
}
