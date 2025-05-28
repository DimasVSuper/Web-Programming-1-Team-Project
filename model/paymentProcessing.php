<?php
require_once __DIR__ . '/../config/DB.php';

/**
 * Class PaymentProcessing
 * Mengelola operasi terkait pembayaran.
 */
class PaymentProcessing
{
    /**
     * Cari invoice berdasarkan nama dan email (Seharusnya di InvoiceProcessing).
     *
     * @param string $nama  Nama.
     * @param string $email Email.
     *
     * @return array|null Data invoice jika ditemukan, null jika tidak.
     *
     * @deprecated Sebaiknya dipindahkan ke InvoiceProcessing
     */
    public static function findInvoiceByNamaEmail($nama, $email)
    {
        $db = new DB();
        $conn = $db->getConnection();
        $sql = "SELECT invoice.*, sr.nama, sr.email, sr.nama_hp, sr.kerusakan
                FROM invoice
                JOIN service_requests sr ON invoice.service_request_id = sr.id
                WHERE sr.nama = ? AND sr.email = ?
                ORDER BY invoice.created_at DESC LIMIT 1";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            error_log("Gagal prepare statement: " . $conn->error);
            return null;
        }

        $stmt->bind_param("ss", $nama, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $invoice = $result->fetch_assoc();

        $stmt->close();
        $conn->close();
        return $invoice;
    }

    /**
     * Ambil data pembayaran berdasarkan ID Invoice.
     *
     * @param string $invoice_id ID Invoice.
     *
     * @return array|null Data pembayaran jika ditemukan, null jika tidak.
     */
    public static function getPaymentByInvoiceId($invoice_id)
    {
        $db = new DB();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM payments WHERE invoice_id = ?");

        if (!$stmt) {
            error_log("Gagal prepare statement: " . $conn->error);
            return null;
        }

        $stmt->bind_param("s", $invoice_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $payment = $result->fetch_assoc();

        $stmt->close();
        $conn->close();
        return $payment;
    }

    /**
     * Set status pembayaran menjadi "paid".
     *
     * @param string $invoice_id ID Invoice.
     *
     * @return bool True jika berhasil, false jika gagal.
     */
    public static function setPaid($invoice_id)
    {
        $db = new DB();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("UPDATE payments SET status = 'paid', paid_at = NOW() WHERE invoice_id = ?");

        if (!$stmt) {
            error_log("Gagal prepare statement: " . $conn->error);
            return false;
        }

        $stmt->bind_param("s", $invoice_id);
        $stmt->execute();

        $stmt->close();
        $conn->close();
        return true;
    }

    /**
     * Buat record pembayaran baru.
     *
     * @param string $invoice_id ID Invoice.
     *
     * @return bool True jika berhasil, false jika gagal.
     */
    public static function createPayment($invoice_id)
    {
        $db = new DB();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("INSERT INTO payments (invoice_id) VALUES (?)");

        if (!$stmt) {
            error_log("Gagal prepare statement: " . $conn->error);
            return false;
        }

        $stmt->bind_param("s", $invoice_id);
        $stmt->execute();

        $stmt->close();
        $conn->close();
        return true;
    }
}