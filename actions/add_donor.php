<?php
require_once __DIR__ . '/../config.php';

$name = $_POST['name'];
$blood = $_POST['blood_group'];
$location = $_POST['location'];

$sql = "INSERT INTO blood_donors (name, blood_group, location)
        VALUES ('$name','$blood','$location')";

$conn->query($sql);

header("Location: ../pages/blood_bank.php");
exit;
