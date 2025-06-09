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
        $pdo  = $db->getConnection();
        $sql  = "INSERT INTO invoice (service_request_id, biaya_awal) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);

        if (!$stmt) {
            error_log("Gagal prepare statement: " . implode(" | ", $pdo->errorInfo()));
            return false;
        }

        $result = $stmt->execute([$service_request_id, $biaya]);

        if (!$result) {
            error_log("Gagal execute statement: " . implode(" | ", $stmt->errorInfo()));
            return false;
        }

        // Ambil ID UUID yang baru dibuat
        $query = $pdo->prepare("SELECT id FROM invoice WHERE service_request_id = ? ORDER BY created_at DESC LIMIT 1");
        $query->execute([$service_request_id]);
        $row = $query->fetch();
        $id = $row['id'] ?? false;

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
        $pdo  = $db->getConnection();
        $sql  = "SELECT invoice.*, sr.nama, sr.email, sr.nama_hp, sr.kerusakan
                FROM invoice
                JOIN service_requests sr ON invoice.service_request_id = sr.id
                WHERE invoice.id = ?";
        $stmt = $pdo->prepare($sql);

        if (!$stmt) {
            error_log("Gagal prepare statement: " . implode(" | ", $pdo->errorInfo()));
            return null;
        }

        $stmt->execute([$id]);
        $invoice = $stmt->fetch();

        return $invoice ?: null;
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
        $pdo  = $db->getConnection();
        $sql  = "SELECT invoice.*, sr.nama, sr.email, sr.nama_hp, sr.kerusakan
                FROM invoice
                JOIN service_requests sr ON invoice.service_request_id = sr.id
                WHERE sr.nama = ? AND sr.email = ?
                ORDER BY invoice.created_at DESC LIMIT 1";
        $stmt = $pdo->prepare($sql);

        if (!$stmt) {
            error_log("Gagal prepare statement: " . implode(" | ", $pdo->errorInfo()));
            return null;
        }

        $stmt->execute([$nama, $email]);
        $invoice = $stmt->fetch();

        return $invoice ?: null;
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
        $pdo = $db->getConnection();
        $stmt = $pdo->prepare("UPDATE invoice SET status = 'paid', paid_at = NOW() WHERE id = ?");
        if (!$stmt) return false;
        $result = $stmt->execute([$invoice_id]);
        return $result;
    }
}