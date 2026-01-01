<?php
require_once __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $group = trim($_POST['blood_group'] ?? '');
    $location = trim($_POST['location'] ?? '');
    $phone = trim($_POST['phone'] ?? '');

    if ($name==='' || $group==='' || $phone==='') {
        die("Invalid donor data");
    }

    $sql = "INSERT INTO blood_donors (name, blood_group, location, phone)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $group, $location, $phone);
    $stmt->execute();

    header("Location: ../pages/blood.php");
    exit;
}
