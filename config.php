<?php
// ================================
// CONFIG (FINAL & SAFE)
// ================================

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database credentials
$host = "localhost";
$user = "root";
$pass = "";
$db   = "community_help_hub_final";

// Create DB connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed");
}
