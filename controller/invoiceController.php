<?php
/**
 * Class InvoiceController
 *
 * Controller untuk mengelola tampilan dan aksi pembayaran invoice service HP.
 */
class InvoiceController
{
    /**
     * Menampilkan halaman invoice berdasarkan ID atau pencarian nama & email.
     */
    public static function showInvoice(): void
    {
        require_once __DIR__ . '/../model/invoiceProcessing.php';
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // CSRF token untuk form pembayaran
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        $csrf_token = $_SESSION['csrf_token'];

        // Sanitasi input GET
        $id    = isset($_GET['id'])    ? trim(filter_var($_GET['id'], FILTER_SANITIZE_STRING)) : null;
        $nama  = isset($_GET['nama'])  ? trim(filter_var($_GET['nama'], FILTER_SANITIZE_SPECIAL_CHARS)) : null;
        $email = isset($_GET['email']) ? trim(strtolower($_GET['email'])) : null;
        // Hanya izinkan karakter email valid (huruf kecil, angka, @, ., _, -)
        if ($email !== null) {
            $email = preg_replace('/[^a-z0-9@._-]/', '', $email);
        }

        $invoice = null;

        // Jika user melakukan pencarian
        if (!$id && $nama && $email) {
            $invoice = InvoiceProcessing::findInvoiceByNamaEmail($nama, $email);
            if (!$invoice) {
                $_SESSION['not_found'] = true;
            }
        } elseif ($id) {
            $invoice = InvoiceProcessing::getInvoiceById($id);
            if (!$invoice) {
                $_SESSION['not_found'] = true;
            }
        }

        // Hitung biaya + PPN 12% (jika biaya_awal sudah ada)
        if ($invoice && isset($invoice['biaya_awal']) && $invoice['biaya_awal'] > 0) {
            $invoice['biaya_awal_ppn'] = $invoice['biaya_awal'] * 1.12;
        }

        require __DIR__ . '/../view/invoice.view.php';
    }

    /**
     * Memproses pembayaran invoice dan menampilkan notifikasi.
     * Mendukung AJAX (JSON response) dan non-AJAX (redirect).
     */
    public static function payInvoice(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';

        // Validasi CSRF token
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
            self::handleResponse($isAjax, 'error', 'CSRF token tidak valid!', 'invoice');
        }

        // Sanitasi input POST
        $id = isset($_POST['id']) ? trim(filter_var($_POST['id'], FILTER_SANITIZE_STRING)) : null;
        if ($id) {
            require_once __DIR__ . '/../model/invoiceProcessing.php';
            InvoiceProcessing::setPaid($id);
            unset($_SESSION['csrf_token']);
            self::handleResponse($isAjax, 'success', 'Pembayaran berhasil!', 'invoice?id=' . urlencode($id));
        }
        self::handleResponse($isAjax, 'error', 'ID invoice tidak ditemukan.', 'invoice');
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
            $_SESSION['success'] = $message;
            header('Location: ' . $redirect);
            exit();
        }
    }

    /**
     * Menyimpan invoice baru ke database.
     */
    public static function saveNewInvoice(string $service_request_id, int $biaya_awal): void
    {
        require_once __DIR__ . '/../model/invoiceProcessing.php';
        InvoiceProcessing::saveInvoice($service_request_id, $biaya_awal);
    }
}