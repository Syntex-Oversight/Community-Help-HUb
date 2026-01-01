<?php
function send_notification($user_id, $message, $link = null) {
    include "config.php";

    $sql = "INSERT INTO notifications (user_id, message, link)
            VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $user_id, $message, $link);
    $stmt->execute();
}
