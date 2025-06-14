<?php

require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../model/serviceProcessing.php';
require_once __DIR__ . '/../model/invoiceProcessing.php';

/**
 * Class ServiceController
 *
 * Controller untuk form layanan service HP.
 */
class ServiceController
{
    /**
     * Menampilkan halaman form service.
     */
    public static function showForm(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        // CSRF token selalu digenerate baru setiap kali form dibuka
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        $csrf_token = $_SESSION['csrf_token'];

        // Base URL dinamis
        $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
        if ($baseUrl === '' || $baseUrl === '\\') $baseUrl = '';

        include __DIR__ . '/../view/service.view.php';
    }

    /**
     * Memproses submit form service dari user.
     * Melakukan validasi, menyimpan data, dan membuat invoice.
     */
    public static function submit(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        // Base URL dinamis
        $baseUrl = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
        if ($baseUrl === '' || $baseUrl === '\\') $baseUrl = '';

        // Validasi CSRF token
        if (
            !isset($_POST['csrf_token']) ||
            !isset($_SESSION['csrf_token']) ||
            $_POST['csrf_token'] !== $_SESSION['csrf_token']
        ) {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'CSRF token tidak valid!';
            header('Location: ' . $baseUrl . '/service');
            exit();
        }
        // Setelah submit, hapus token agar tidak reuse
        unset($_SESSION['csrf_token']);

        // Ambil dan sanitasi data POST
        $nama      = trim(filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
        $email     = trim(strtolower($_POST['email'] ?? ''));
        $email     = preg_replace('/[^a-z0-9@._-]/', '', $email); // hanya karakter email valid
        $nama_hp   = trim(filter_input(INPUT_POST, 'nama_hp', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
        $kerusakan = trim(filter_input(INPUT_POST, 'kerusakan', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');

        // Validasi email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Email tidak valid atau mengandung karakter terlarang.';
            header('Location: ' . $baseUrl . '/service');
            exit();
        }

        // Validasi input lain
        if (!ServiceProcessing::validate($nama, $email, $nama_hp, $kerusakan)) {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Mohon isi semua kolom dengan benar.';
            header('Location: ' . $baseUrl . '/service');
            exit();
        }

        // Simpan service request, pastikan return ID
        $service_request_id = ServiceProcessing::save($nama, $email, $nama_hp, $kerusakan);

        if ($service_request_id) {
            // Buat invoice (biaya_awal = 0)
            $biaya_awal = 0;
            InvoiceProcessing::saveInvoice($service_request_id, $biaya_awal);
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'Data service berhasil dikirim!';
        } else {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Terjadi kesalahan saat mengirim data service.';
        }
        header('Location: ' . $baseUrl . '/service');
        exit();
    }
}