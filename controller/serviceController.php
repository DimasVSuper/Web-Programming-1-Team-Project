<?php

require_once __DIR__ . '/../config/DB.php';

/**
 * Class ServiceController
 * Mengelola operasi CRUD dan form untuk layanan service.
 */
class ServiceController
{
    /**
     * Ambil semua data service.
     * @return array
     */
    public static function getAllServices()
    {
        $db = new DB();
        $conn = $db->getConnection();
        $sql = "SELECT * FROM services ORDER BY id ASC";
        $result = $conn->query($sql);

        $services = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $services[] = $row;
            }
        }
        $conn->close();
        return $services;
    }

    /**
     * Ambil data service berdasarkan ID.
     * @param int $id
     * @return array|null
     */
    public static function getServiceById($id)
    {
        $db = new DB();
        $conn = $db->getConnection();
        $sql = "SELECT * FROM services WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) return null;
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $service = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $service;
    }

    /**
     * Tambah data service baru.
     * @param string $name
     * @param string $description
     * @param float $price
     * @return bool
     */
    public static function addService($name, $description, $price)
    {
        $db = new DB();
        $conn = $db->getConnection();
        $sql = "INSERT INTO services (name, description, price) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param('ssd', $name, $description, $price);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    }

    /**
     * Update data service.
     * @param int $id
     * @param string $name
     * @param string $description
     * @param float $price
     * @return bool
     */
    public static function updateService($id, $name, $description, $price)
    {
        $db = new DB();
        $conn = $db->getConnection();
        $sql = "UPDATE services SET name = ?, description = ?, price = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param('ssdi', $name, $description, $price, $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    }

    /**
     * Hapus data service.
     * @param int $id
     * @return bool
     */
    public static function deleteService($id)
    {
        $db = new DB();
        $conn = $db->getConnection();
        $sql = "DELETE FROM services WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) return false;
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        $stmt->close();
        $conn->close();
        return $result;
    }

    /**
     * Tampilkan halaman form service.
     * @return void
     */
    public static function showForm()
    {
        include __DIR__ . '/../view/src/service.view.php';
    }

    /**
     * Proses submit form service.
     * @return void
     */
    public static function submit()
    {
        require_once __DIR__ . '/../model/serviceProcessing.php';
        require_once __DIR__ . '/../model/invoiceProcessing.php';

        $nama = $_POST['nama'] ?? '';
        $email = $_POST['email'] ?? '';
        $nama_hp = $_POST['nama_hp'] ?? '';
        $kerusakan = $_POST['kerusakan'] ?? '';

        // Simpan service request, pastikan return ID
        $service_request_id = saveServiceRequest($nama, $email, $nama_hp, $kerusakan);

        if ($service_request_id) {
            // Buat invoice (misal biaya_awal = 0)
            $biaya_awal = 0;
            $invoice_id = InvoiceProcessing::saveInvoice($service_request_id, $biaya_awal);

            // Tidak perlu createPayment lagi!
            $_SESSION['status'] = 'success';
        } else {
            $_SESSION['status'] = 'error';
        }
        header('Location: /projek/service');
        exit();
    }
}