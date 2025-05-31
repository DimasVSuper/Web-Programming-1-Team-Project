<?php
require_once __DIR__ . '/../config/DB.php';

/**
 * Class InvoiceProcessing
 * Mengelola operasi terkait invoice.
 */
class InvoiceProcessing
{
    /**
     * Simpan invoice baru.
     *
     * @param string $service_request_id ID dari service request.
     * @param int    $biaya             Biaya invoice.
     *
     * @return string|false ID invoice jika berhasil, false jika gagal.
     */
    public static function saveInvoice($service_request_id, $biaya)
    {
        $db   = new DB();
        $conn = $db->getConnection();
        $sql  = "INSERT INTO invoice (service_request_id, biaya_awal) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            error_log("Gagal prepare statement: " . $conn->error);
            return false;
        }

        $stmt->bind_param("si", $service_request_id, $biaya);
        $result = $stmt->execute();

        if (!$result) {
            error_log("Gagal execute statement: " . $stmt->error);
            $stmt->close();
            $conn->close();
            return false;
        }

        // Ambil ID UUID yang baru dibuat
        $query = $conn->query("SELECT id FROM invoice WHERE service_request_id='$service_request_id' ORDER BY created_at DESC LIMIT 1");
        $row = $query->fetch_assoc();
        $id = $row['id'] ?? false;

        $stmt->close();
        $conn->close();

        return $id;
    }

    /**
     * Ambil invoice berdasarkan ID.
     *
     * @param string $id ID invoice.
     *
     * @return array|null Data invoice jika ditemukan, null jika tidak.
     */
    public static function getInvoiceById($id)
    {
        $db   = new DB();
        $conn = $db->getConnection();
        $sql  = "SELECT invoice.*, sr.nama, sr.email, sr.nama_hp, sr.kerusakan
                FROM invoice
                JOIN service_requests sr ON invoice.service_request_id = sr.id
                WHERE invoice.id = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            error_log("Gagal prepare statement: " . $conn->error); // Log error
            return null;
        }

        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result  = $stmt->get_result();
        $invoice = $result->fetch_assoc();

        $stmt->close();
        $conn->close();

        return $invoice;
    }

    /**
     * Cari invoice berdasarkan nama dan email.
     *
     * @param string $nama  Nama.
     * @param string $email Email.
     *
     * @return array|null Data invoice jika ditemukan, null jika tidak.
     */
    public static function findInvoiceByNamaEmail($nama, $email)
    {
        $db   = new DB();
        $conn = $db->getConnection();
        $sql  = "SELECT invoice.*, sr.nama, sr.email, sr.nama_hp, sr.kerusakan
                FROM invoice
                JOIN service_requests sr ON invoice.service_request_id = sr.id
                WHERE sr.nama = ? AND sr.email = ?
                ORDER BY invoice.created_at DESC LIMIT 1";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            error_log("Gagal prepare statement: " . $conn->error); // Log error
            return null;
        }

        $stmt->bind_param("ss", $nama, $email);
        $stmt->execute();
        $result  = $stmt->get_result();
        $invoice = $result->fetch_assoc();

        $stmt->close();
        $conn->close();

        return $invoice;
    }

    /**
     * Set status pembayaran menjadi "paid".
     *
     * @param string $invoice_id
     * @return bool
     */
    public static function setPaid($invoice_id)
    {
        $db = new DB();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("UPDATE invoice SET status = 'paid', paid_at = NOW() WHERE id = ?");
        if (!$stmt) return false;
        $stmt->bind_param("s", $invoice_id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    }
}