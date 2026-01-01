<?php
require_once "config.php";

$email    = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // ⚠️ Plain password check (as your DB uses plain text)
    if ($password === $user['password']) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['role']    = $user['role'];
        $_SESSION['name']    = $user['name'];

        header("Location: index.php");
        exit;
    }
}

header("Location: login.php?error=1");
exit;
