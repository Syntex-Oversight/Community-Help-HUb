<?php
if (!isset($_SESSION['user_id'])) { header("Location: index.php?page=login"); exit; }
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM help_requests WHERE user_id = ? ORDER BY created_at DESC";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
?>
<h2>My Requests</h2>
<table class="table">
    <tr><th>Title</th><th>Category</th><th>Status</th><th>Created</th><th>Action</th></tr>
    <?php while($row = mysqli_fetch_assoc($res)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['title']); ?></td>
            <td><?php echo htmlspecialchars($row['category']); ?></td>
            <td><?php echo htmlspecialchars($row['status']); ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><a href="index.php?page=request_view&id=<?php echo $row['request_id']; ?>">View</a></td>
        </tr>
    <?php endwhile; ?>
</table>
