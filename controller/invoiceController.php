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
        require_once __DIR__ . '/../model/paymentProcessing.php';
        $id = $_GET['id'] ?? null;
        $invoice = null;
        $payment = null;

        // Jika cari berdasarkan nama & email
        if (!$id && isset($_GET['nama'], $_GET['email'])) {
            $invoice = InvoiceProcessing::findInvoiceByNamaEmail($_GET['nama'], $_GET['email']);
            if ($invoice) {
                $id = $invoice['id'];
                $payment = PaymentProcessing::getPaymentByInvoiceId($id);
            }
        } elseif ($id) {
            $invoice = InvoiceProcessing::getInvoiceById($id);
            $payment = PaymentProcessing::getPaymentByInvoiceId($id);
        }

        include __DIR__ . '/../view/src/invoice.view.php';
    }

    /**
     * Proses pembayaran invoice dan tampilkan notifikasi.
     * @return void
     */
    public static function payInvoice()
    {
        require_once __DIR__ . '/../model/paymentProcessing.php';
        session_start();
        $id = $_POST['id'] ?? null;
        if ($id) {
            PaymentProcessing::setPaid($id);
            $_SESSION['success'] = 'Anda berhasil membayar!';
        }
        // Tampilkan kembali halaman invoice (dengan notifikasi)
        header("Location: /invoice?id=" . $id . "&paid=1");
        exit();
    }
}