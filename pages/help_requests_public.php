<?php
include "config.php";

$sql = "SELECT r.request_id, r.title, r.category, r.status, r.created_at,
               u.name
        FROM help_requests r
        JOIN users u ON r.user_id = u.user_id
        ORDER BY r.created_at DESC";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<h2>All Help Requests</h2>

<table class="table">
    <tr>
        <th>Title</th>
        <th>Category</th>
        <th>User</th>
        <th>Status</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

<?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['category']) ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['status']) ?></td>
        <td><?= htmlspecialchars($row['created_at']) ?></td>
        <td>
            <a class="btn" href="index.php?page=request_view&id=<?= $row['request_id'] ?>">View</a>
        </td>
    </tr>
<?php endwhile; ?>

</table>
