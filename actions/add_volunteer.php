<?php
require_once __DIR__ . '/../config.php';

$skill = $_POST['skill'];
$availability = $_POST['availability'];

$sql = "INSERT INTO volunteers (skill, availability)
        VALUES ('$skill','$availability')";

$conn->query($sql);

header("Location: ../pages/volunteers.php");
exit;
