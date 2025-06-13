<?php

require_once __DIR__ . '/../config/DB.php';
require_once __DIR__ . '/../model/serviceProcessing.php';
require_once __DIR__ . '/../model/invoiceProcessing.php';

/**
 * Class ServiceController
 *
 * Controller untuk mengelola operasi CRUD dan form layanan service HP.
 *
 * @package projek\controller
 */
class ServiceController
{
    /**
     * Mengambil semua data service dari database.
     *
     * @return array Daftar seluruh service.
     */
    public static function getAllServices(): array
    {
        $db = new DB();
        $pdo = $db->getConnection();
        $sql = "SELECT * FROM services ORDER BY id ASC";
        $stmt = $pdo->query($sql);
        $services = $stmt->fetchAll();
        return $services;
    }

    /**
     * Mengambil data service berdasarkan ID.
     *
     * @param int $id ID service.
     * @return array|null Data service jika ditemukan, null jika tidak.
     */
    public static function getServiceById(int $id): ?array
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
     * Menambahkan data service baru ke database.
     *
     * @param string $name        Nama service.
     * @param string $description Deskripsi service.
     * @param float  $price       Harga service.
     * @return bool  True jika berhasil, false jika gagal.
     */
    public static function addService(string $name, string $description, float $price): bool
    {
        $db = new DB();
        $pdo = $db->getConnection();
        $sql = "INSERT INTO services (name, description, price) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$name, $description, $price]);
    }

    /**
     * Memperbarui data service berdasarkan ID.
     *
     * @param int    $id          ID service.
     * @param string $name        Nama service.
     * @param string $description Deskripsi service.
     * @param float  $price       Harga service.
     * @return bool  True jika berhasil, false jika gagal.
     */
    public static function updateService(int $id, string $name, string $description, float $price): bool
    {
        $db = new DB();
        $pdo = $db->getConnection();
        $sql = "UPDATE services SET name = ?, description = ?, price = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$name, $description, $price, $id]);
    }

    /**
     * Menghapus data service berdasarkan ID.
     *
     * @param int $id ID service.
     * @return bool   True jika berhasil, false jika gagal.
     */
    public static function deleteService(int $id): bool
    {
        $db = new DB();
        $pdo = $db->getConnection();
        $sql = "DELETE FROM services WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    /**
     * Menampilkan halaman form service.
     *
     * @return void
     */
    public static function showForm(): void
    {
        include __DIR__ . '/../view/service.view.php';
    }

    /**
     * Memproses submit form service dari user.
     * Melakukan validasi, menyimpan data, dan membuat invoice.
     * Redirect ke halaman form dengan notifikasi status.
     *
     * @return void
     */
    public static function submit(): void
    {
        if (session_status() === PHP_SESSION_NONE) session_start();

        // Ambil dan sanitasi data POST
        $nama      = trim(filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
        $email     = trim(strtolower($_POST['email'] ?? ''));
        $email     = preg_replace('/[^a-z0-9@._-]/', '', $email); // hanya karakter email valid
        $nama_hp   = trim(filter_input(INPUT_POST, 'nama_hp', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
        $kerusakan = trim(filter_input(INPUT_POST, 'kerusakan', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');

        // Validasi email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Email tidak valid atau mengandung karakter terlarang.';
            header('Location: /projek/service');
            exit();
        }

        // Validasi input lain
        if (!ServiceProcessing::validate($nama, $email, $nama_hp, $kerusakan)) {
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Mohon isi semua kolom dengan benar.';
            header('Location: /projek/service');
            exit();
        }

        // Simpan service request, pastikan return ID
        $service_request_id = ServiceProcessing::save($nama, $email, $nama_hp, $kerusakan);

        if ($service_request_id) {
            // Buat invoice (biaya_awal = 0)
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