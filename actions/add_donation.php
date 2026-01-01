<?php
require_once __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = trim($_POST['item'] ?? '');
    $quantity = (int)($_POST['quantity'] ?? 0);
    $note = trim($_POST['note'] ?? '');

    if ($item === '' || $quantity <= 0) {
        die("Invalid donation data");
    }

    $sql = "INSERT INTO donations (item, quantity, note) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $item, $quantity, $note);
    $stmt->execute();

    header("Location: ../pages/donations.php");
    exit;
}
