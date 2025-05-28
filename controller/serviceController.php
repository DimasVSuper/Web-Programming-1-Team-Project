<?php

require_once __DIR__ . '/../config/DB.php';

class ServiceController
{
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

    // Untuk menampilkan halaman service (view)
    public static function showForm()
    {
        include __DIR__ . '/../view/src/service.view.php';
    }

    public static function submit()
    {
    require_once __DIR__ . '/../model/serviceProcessing.php';
    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $nama_hp = $_POST['nama_hp'] ?? '';
    $kerusakan = $_POST['kerusakan'] ?? '';

    if (saveServiceRequest($nama, $email, $nama_hp, $kerusakan)) {
        $_SESSION['status'] = 'success';
    } else {
        $_SESSION['status'] = 'error';
    }
    header('Location: /service');
    exit();
    }
}