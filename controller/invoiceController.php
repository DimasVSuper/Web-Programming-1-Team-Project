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

        // Hitung biaya + PPN 12% (jika biaya_awal sudah ada)
        if ($invoice && isset($invoice['biaya_awal']) && $invoice['biaya_awal'] > 0) {
            $invoice['biaya_awal_ppn'] = $invoice['biaya_awal'] * 1.12;
        }

        // Kirim $invoice ke view
        $showNotFound = false;
        if (!$invoice) {
            $_SESSION['not_found'] = true;
        }
        require __DIR__ . '/../view/src/invoice.view.php';
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