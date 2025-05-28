<?php
require_once __DIR__ . '/../config/DB.php';

class PaymentProcessing
{
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
        if (!$stmt) return null;
        $stmt->bind_param("ss", $nama, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $invoice = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $invoice;
    }
    public static function getPaymentByInvoiceId($invoice_id)
    {
        $db = new DB();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM payments WHERE invoice_id = ?");
        if (!$stmt) return null;
        $stmt->bind_param("s", $invoice_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $payment = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $payment;
    }

    public static function setPaid($invoice_id)
    {
        $db = new DB();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("UPDATE payments SET status = 'paid', paid_at = NOW() WHERE invoice_id = ?");
        if (!$stmt) return false;
        $stmt->bind_param("s", $invoice_id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        return true;
    }

    public static function createPayment($invoice_id)
    {
        $db = new DB();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("INSERT INTO payments (invoice_id) VALUES (?)");
        if (!$stmt) return false;
        $stmt->bind_param("s", $invoice_id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        return true;
    }
}