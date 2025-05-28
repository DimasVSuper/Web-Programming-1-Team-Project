<?php
require_once __DIR__ . '/../config/DB.php';

function saveServiceRequest($nama, $email, $nama_hp, $kerusakan) {
    $db = new DB();
    $conn = $db->getConnection();
    $stmt = $conn->prepare("INSERT INTO service_requests (nama, email, nama_hp, kerusakan) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        return false;
    }
    $stmt->bind_param("ssss", $nama, $email, $nama_hp, $kerusakan);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();
    return $result;
}