<?php

require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../model/serviceProcessing.php';
require_once __DIR__ . '/../model/invoiceProcessing.php';

class ServiceController
{
    public static function showForm(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        $csrf_token = $_SESSION['csrf_token'];
        include __DIR__ . '/../view/service.view.php';
    }

    public static function submit(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';

        // Validasi CSRF token
        if (
            !isset($_POST['csrf_token']) ||
            !isset($_SESSION['csrf_token']) ||
            $_POST['csrf_token'] !== $_SESSION['csrf_token']
        ) {
            unset($_SESSION['csrf_token']);
            self::handleResponse($isAjax, 'error', 'CSRF token tidak valid!', 'service');
        }
        unset($_SESSION['csrf_token']);

        // Ambil dan sanitasi data POST
        $nama      = trim(filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
        $email     = trim(strtolower($_POST['email'] ?? ''));
        $email     = preg_replace('/[^a-z0-9@._-]/', '', $email);
        $nama_hp   = trim(filter_input(INPUT_POST, 'nama_hp', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
        $kerusakan = trim(filter_input(INPUT_POST, 'kerusakan', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');

        // Validasi email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            self::handleResponse($isAjax, 'error', 'Email tidak valid atau mengandung karakter terlarang.', 'service');
        }

        // Validasi input lain
        if (!ServiceProcessing::validate($nama, $email, $nama_hp, $kerusakan)) {
            self::handleResponse($isAjax, 'error', 'Mohon isi semua kolom dengan benar.', 'service');
        }

        // Simpan service request, pastikan return ID
        $service_request_id = ServiceProcessing::save($nama, $email, $nama_hp, $kerusakan);

        if ($service_request_id) {
            $biaya_awal = 0;
            InvoiceProcessing::saveInvoice($service_request_id, $biaya_awal);
            self::handleResponse($isAjax, 'success', 'Data service berhasil dikirim!', 'service');
        } else {
            self::handleResponse($isAjax, 'error', 'Terjadi kesalahan saat mengirim data service.', 'service');
        }
    }

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
            exit();
        }
    }
}