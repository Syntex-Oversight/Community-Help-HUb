<?php
include "../config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $address = trim($_POST["address"]);
    if (empty($name) || empty($email) || empty($_POST["password"])) { die("All required fields must be filled!"); }
    $sql = "INSERT INTO users (name, email, phone, password, address) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $password, $address);
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../index.php?page=login&msg=registered");
        exit;
    } else { die("Error: " . mysqli_error($conn)); }
}
?>
