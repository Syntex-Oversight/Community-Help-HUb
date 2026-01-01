<?php
include __DIR__ . '/../config.php';

// Temporary user id
$user_id = 1;

$request_type = $_POST['request_type'];
$title        = $_POST['title'];
$description  = $_POST['description'];
$category     = $_POST['category'];
$location     = $_POST['location'];
$priority     = $_POST['priority'];
$status       = 'pending';

$sql = "INSERT INTO help_requests
(user_id, request_type, title, description, category, location, status, priority)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "isssssss",
    $user_id,
    $request_type,
    $title,
    $description,
    $category,
    $location,
    $status,
    $priority
);

if ($stmt->execute()) {
    header("Location: ../pages/my_requests.php?success=1");
    exit();
} else {
    echo "Error saving request.";
}
