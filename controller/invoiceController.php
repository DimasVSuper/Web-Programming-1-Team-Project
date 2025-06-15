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
     */
    public static function payInvoice(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Validasi CSRF token
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
            $_SESSION['success'] = 'CSRF token tidak valid!';
            header("Location: invoice");
            exit();
        }

        // Sanitasi input POST
        $id = isset($_POST['id']) ? trim(filter_var($_POST['id'], FILTER_SANITIZE_STRING)) : null;
        if ($id) {
            require_once __DIR__ . '/../model/invoiceProcessing.php';
            InvoiceProcessing::setPaid($id);
            $_SESSION['success'] = 'Pembayaran berhasil!';
            // (Opsional) Regenerasi CSRF token setelah submit
            unset($_SESSION['csrf_token']);
        }
        header("Location: invoice?id=" . urlencode($id));
        exit();
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