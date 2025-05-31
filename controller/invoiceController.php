<?php
/**
 * Class InvoiceController
 * Mengelola tampilan dan aksi pembayaran invoice.
 */
class InvoiceController
{
    /**
     * Tampilkan halaman invoice berdasarkan ID atau pencarian nama & email.
     * @return void
     */
    public static function showInvoice()
    {
        require_once __DIR__ . '/../model/invoiceProcessing.php';
        $id = $_GET['id'] ?? null;
        $invoice = null;
        $not_found = false;

        // Jika user melakukan pencarian
        if (!$id && isset($_GET['nama'], $_GET['email'])) {
            $invoice = InvoiceProcessing::findInvoiceByNamaEmail($_GET['nama'], $_GET['email']);
            if ($invoice) {
                $id = $invoice['id'];
            } else {
                $not_found = true;
            }
        } elseif ($id) {
            $invoice = InvoiceProcessing::getInvoiceById($id);
            if (!$invoice) {
                $not_found = true;
            }
        }

        include __DIR__ . '/../view/src/invoice.view.php';
    }

    /**
     * Proses pembayaran invoice dan tampilkan notifikasi.
     * @return void
     */
    public static function payInvoice()
    {
        session_start();
        $id = $_POST['id'] ?? null;
        if ($id) {
            require_once __DIR__ . '/../model/invoiceProcessing.php';
            InvoiceProcessing::setPaid($id);
            $_SESSION['success'] = 'Pembayaran berhasil!';
        }
        header("Location: /projek/invoice?id=" . urlencode($id));
        exit();
    }

    /**
     * Simpan invoice baru ke database.
     * @return void
     */
    public static function saveNewInvoice($service_request_id, $biaya_awal)
    {
        require_once __DIR__ . '/../model/invoiceProcessing.php';
        InvoiceProcessing::saveInvoice($service_request_id, $biaya_awal);
    }
}