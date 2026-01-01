<?php
if (!isset($_SESSION['user_id'])) {
    echo "<p>Please login first. <a href='index.php?page=login'>Login</a></p>";
    return;
}

if (isset($_POST['submit_request'])) {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO help_requests (user_id, title, description, location, created_at)
            VALUES ('$user_id', '$title', '$description', '$location', NOW())";

    if (mysqli_query($conn, $sql)) {
        echo "<p>Help Request Submitted! <a href='index.php?page=dashboard'>Back to Dashboard</a></p>";
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<h2>Request for Help</h2>
<form method="POST">
    Title: <input type="text" name="title" required><br><br>
    Description: <textarea name="description" required></textarea><br><br>
    Location: <input type="text" name="location" required><br><br>
    <button type="submit" name="submit_request">Submit</button>
</form>
