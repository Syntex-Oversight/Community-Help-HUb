
<?php
session_start();
include "../config.php";
include "../includes/notify.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php?page=login");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $request_id = $_POST['request_id'];
    $message = $_POST['message'];
    $user_id = $_SESSION['user_id'];

    // Insert help offer
    $sql = "INSERT INTO help_offers (request_id, user_id, message)
            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $request_id, $user_id, $message);
    $stmt->execute();

    // Get request owner
    $q = $conn->prepare("SELECT user_id, title FROM help_requests WHERE request_id = ?");
    $q->bind_param("i", $request_id);
    $q->execute();
    $rq = $q->get_result()->fetch_assoc();

    $owner_id = $rq['user_id'];
    $title = $rq['title'];

    // Send notification
    send_notification($owner_id, "Someone offered help on your request: $title", "index.php?page=request_view&id=$request_id");

    header("Location: ../index.php?page=request_view&id=$request_id");
}
