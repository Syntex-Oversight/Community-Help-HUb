<?php
include "config.php";

if (!isset($_SESSION['user_id'])) {
    echo "<p>Please login.</p>";
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM notifications
        WHERE user_id = $user_id
        ORDER BY created_at DESC";

$result = $conn->query($sql);

// Mark all as seen
$conn->query("UPDATE notifications SET is_seen=1 WHERE user_id=$user_id");
?>

<h2>Notifications</h2>

<?php while ($n = $result->fetch_assoc()): ?>
    <div class="notify-box">
        <p><?= $n['message'] ?></p>
        <small><?= $n['created_at'] ?></small><br>

        <?php if ($n['link']): ?>
            <a class="btn" href="<?= $n['link'] ?>">Open</a>
        <?php endif; ?>

        <hr>
    </div>
<?php endwhile; ?>
