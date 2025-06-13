<?php
require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../model/contactProcessing.php';

/**
 * Class ContactController
 *
 * Controller untuk menangani form kontak dan pengiriman pesan dari user.
 *
 * @package projek\controller
 */
class ContactController
{
    /**
     * Menampilkan form kontak ke user.
     *
     * @return void
     */
    public static function showForm(): void
    {
        include __DIR__ . '/../view/contact.view.php';
    }

    /**
     * Memproses submit form kontak.
     *
     * - Validasi input.
     * - Simpan pesan ke database.
     * - Set status session untuk notifikasi.
     * - Redirect kembali ke halaman kontak.
     *
     * @return void
     */
    public static function submit(): void
    {
        session_start();

        // Pastikan request adalah POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /projek/contact');
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
            header('Location: /projek/contact');
            exit;
        }

        // Validasi input menggunakan method di ContactProcessing
        if (!ContactProcessing::validate($name, $email, $subject, $message)) {
            $_SESSION['status']  = 'error';
            $_SESSION['message'] = 'Mohon isi semua kolom dengan benar.';
            header('Location: /projek/contact');
            exit;
        }

        // Simpan pesan ke database
        if (ContactProcessing::save($name, $email, $subject, $message)) {
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
