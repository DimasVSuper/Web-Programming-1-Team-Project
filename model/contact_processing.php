<?php
require_once __DIR__ . '/../config/DB.php';

function saveContactMessage($conn, $name, $email, $subject, $message) {
    $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) return false;
    $stmt->bind_param('ssss', $name, $email, $subject, $message);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

function validateContactInput($name, $email, $subject, $message) {
    return !(empty($name) || empty($email) || empty($subject) || empty($message));
}
