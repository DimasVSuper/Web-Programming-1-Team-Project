<?php
require_once __DIR__ . '/../config/DB.php';

/**
 * Class InvoiceProcessing
 *
 * Mengelola operasi terkait invoice service HP.
 */
class InvoiceProcessing
{
    /**
     * Simpan invoice baru ke database.
     *
     * @param string $service_request_id ID dari service request.
     * @param int    $biaya              Biaya awal invoice.
     * @return string|false              ID invoice (UUID) jika berhasil, false jika gagal.
     */
    public static function saveInvoice(string $service_request_id, int $biaya)
    {
        try {
            $db   = new DB();
            $pdo  = $db->getConnection();
            $sql  = "INSERT INTO invoice (service_request_id, biaya_awal) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);

            if (!$stmt) {
                error_log("[InvoiceProcessing] Gagal prepare statement: " . implode(" | ", $pdo->errorInfo()));
                return false;
            }

            $result = $stmt->execute([$service_request_id, $biaya]);
            if (!$result) {
                error_log("[InvoiceProcessing] Gagal execute statement: " . implode(" | ", $stmt->errorInfo()));
                return false;
            }

            // Ambil ID UUID yang baru dibuat (karena pakai UUID, lastInsertId tidak bisa dipakai)
            $query = $pdo->prepare("SELECT id FROM invoice WHERE service_request_id = ? ORDER BY created_at DESC LIMIT 1");
            $query->execute([$service_request_id]);
            $row = $query->fetch();
            return $row['id'] ?? false;
        } catch (\PDOException $e) {
            error_log("[InvoiceProcessing] PDOException: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Ambil data invoice berdasarkan ID invoice.
     *
     * @param string $id ID invoice.
     * @return array|null Data invoice jika ditemukan, null jika tidak.
     */
    public static function getInvoiceById(string $id): ?array
    {
        try {
            $db   = new DB();
            $pdo  = $db->getConnection();
            $sql  = "SELECT invoice.*, sr.nama, sr.email, sr.nama_hp, sr.kerusakan
                    FROM invoice
                    JOIN service_requests sr ON invoice.service_request_id = sr.id
                    WHERE invoice.id = ?";
            $stmt = $pdo->prepare($sql);

            if (!$stmt) {
                error_log("[InvoiceProcessing] Gagal prepare statement: " . implode(" | ", $pdo->errorInfo()));
                return null;
            }

            $stmt->execute([$id]);
            $invoice = $stmt->fetch();

            return $invoice ?: null;
        } catch (\PDOException $e) {
            error_log("[InvoiceProcessing] PDOException: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Cari invoice berdasarkan nama dan email pelanggan.
     *
     * @param string $nama  Nama pelanggan.
     * @param string $email Email pelanggan.
     * @return array|null   Data invoice jika ditemukan, null jika tidak.
     */
    public static function findInvoiceByNamaEmail(string $nama, string $email): ?array
    {
        try {
            $db   = new DB();
            $pdo  = $db->getConnection();
            $sql  = "SELECT invoice.*, sr.nama, sr.email, sr.nama_hp, sr.kerusakan
                    FROM invoice
                    JOIN service_requests sr ON invoice.service_request_id = sr.id
                    WHERE sr.nama = ? AND sr.email = ?
                    ORDER BY invoice.created_at DESC LIMIT 1";
            $stmt = $pdo->prepare($sql);

            if (!$stmt) {
                error_log("[InvoiceProcessing] Gagal prepare statement: " . implode(" | ", $pdo->errorInfo()));
                return null;
            }

            $stmt->execute([$nama, $email]);
            $invoice = $stmt->fetch();

            return $invoice ?: null;
        } catch (\PDOException $e) {
            error_log("[InvoiceProcessing] PDOException: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Set status pembayaran invoice menjadi "paid".
     *
     * @param string $invoice_id ID invoice.
     * @return bool              True jika berhasil, false jika gagal.
     */
    public static function setPaid(string $invoice_id): bool
    {
        try {
            $db = new DB();
            $pdo = $db->getConnection();
            $stmt = $pdo->prepare("UPDATE invoice SET status = 'paid', paid_at = NOW() WHERE id = ?");
            if (!$stmt) {
                error_log("[InvoiceProcessing] Gagal prepare statement: " . implode(" | ", $pdo->errorInfo()));
                return false;
            }
            $result = $stmt->execute([$invoice_id]);
            if (!$result) {
                error_log("[InvoiceProcessing] Gagal execute statement: " . implode(" | ", $stmt->errorInfo()));
            }
            return $result;
        } catch (\PDOException $e) {
            error_log("[InvoiceProcessing] PDOException: " . $e->getMessage());
            return false;
        }
    }
}