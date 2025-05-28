<?php
require_once __DIR__ . '/../config/DB.php';

class InvoiceProcessing
{
    // Simpan invoice baru
    public static function saveInvoice($service_request_id, $biaya)
    {
        $db = new DB();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("INSERT INTO invoice (service_request_id, biaya) VALUES (?, ?)");
        if (!$stmt) return false;
        $stmt->bind_param("si", $service_request_id, $biaya);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    }

    // Ambil invoice berdasarkan id
    public static function getInvoiceById($id)
    {
        $db = new DB();
        $conn = $db->getConnection();
        $sql = "SELECT invoice.*, sr.nama, sr.email, sr.nama_hp, sr.kerusakan
                FROM invoice
                JOIN service_requests sr ON invoice.service_request_id = sr.id
                WHERE invoice.id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) return null;
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $invoice = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $invoice;
    }
    public static function findInvoiceByNamaEmail($nama, $email)
    {
        $db = new DB();
        $conn = $db->getConnection();
        $sql  =  "SELECT invoice.*, sr.nama, sr.email, sr.nama_hp, sr.kerusakan
                FROM invoice
                JOIN service_requests sr ON invoice.service_request_id = sr.id
                WHERE sr.nama = ? AND sr.email = ?
                ORDER BY invoice.created_at DESC LIMIT 1";
        $stmt = $conn->prepare($sql);
        if (!$stmt) return null;
        $stmt->bind_param("ss", $nama, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $invoice = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $invoice;
    }
}