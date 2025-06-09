<?php

require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../model/serviceProcessing.php';
require_once __DIR__ . '/../model/invoiceProcessing.php';

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
        $pdo = $db->getConnection();
        $sql = "SELECT * FROM services ORDER BY id ASC";
        $stmt = $pdo->query($sql);
        $services = $stmt->fetchAll();
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
        $pdo = $db->getConnection();
        $sql = "SELECT * FROM services WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $service = $stmt->fetch();
        return $service ?: null;
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
        $pdo = $db->getConnection();
        $sql = "INSERT INTO services (name, description, price) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$name, $description, $price]);
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
        $pdo = $db->getConnection();
        $sql = "UPDATE services SET name = ?, description = ?, price = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$name, $description, $price, $id]);
    }

    /**
     * Hapus data service.
     * @param int $id
     * @return bool
     */
    public static function deleteService($id)
    {
        $db = new DB();
        $pdo = $db->getConnection();
        $sql = "DELETE FROM services WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    /**
     * Tampilkan halaman form service.
     * @return void
     */
    public static function showForm()
    {
        include __DIR__ . '/../view/service.view.php';
    }

    /**
     * Proses submit form service.
     * @return void
     */
    public static function submit()
    {
        session_start();

        // Ambil data POST dan bersihkan
        $nama      = trim($_POST['nama'] ?? '');
        $email     = trim($_POST['email'] ?? '');
        $nama_hp   = trim($_POST['nama_hp'] ?? '');
        $kerusakan = trim($_POST['kerusakan'] ?? '');

        // Validasi input
        if (!ServiceProcessing::validate($nama, $email, $nama_hp, $kerusakan)) {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Mohon isi semua kolom dengan benar.';
            header('Location: /projek/service');
            exit();
        }

        // Simpan service request, pastikan return ID
        $service_request_id = ServiceProcessing::save($nama, $email, $nama_hp, $kerusakan);

        if ($service_request_id) {
            // Buat invoice (misal biaya_awal = 0)
            $biaya_awal = 0;
            InvoiceProcessing::saveInvoice($service_request_id, $biaya_awal);
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'Data service berhasil dikirim!';
        } else {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Terjadi kesalahan saat mengirim data service.';
        }
        header('Location: /projek/service');
        exit();
    }
}