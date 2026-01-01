<?php
include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../config.php';

$user_id = 1;

$result = $conn->query(
    "SELECT * FROM help_requests 
     WHERE user_id = $user_id 
     ORDER BY created_at DESC"
);
?>

<h2>My Help Requests</h2>

<?php if (isset($_GET['success'])): ?>
    <p style="color:green;">Request submitted successfully!</p>
<?php endif; ?>

<table class="table">
    <tr>
        <th>Type</th>
        <th>Title</th>
        <th>Category</th>
        <th>Location</th>
        <th>Priority</th>
        <th>Status</th>
        <th>Date</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= ucfirst($row['request_type']); ?></td>
        <td><?= $row['title']; ?></td>
        <td><?= $row['category']; ?></td>
        <td><?= $row['location']; ?></td>
        <td><?= ucfirst($row['priority']); ?></td>
        <td><?= ucfirst($row['status']); ?></td>
        <td><?= $row['created_at']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>

<?php include __DIR__ . '/../includes/footer.php'; ?>
