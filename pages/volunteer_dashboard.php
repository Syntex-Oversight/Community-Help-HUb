<?php
if (!isset($_SESSION['volunteer_id'])) {
    echo "<p>Please login first. <a href='index.php?page=volunteer_login'>Login</a></p>";
    return;
}
?>

<h2>Welcome Volunteer, <?php echo $_SESSION['name']; ?> 👋</h2>
<h3>All Help Requests</h3>

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>User ID</th>
    <th>Title</th>
    <th>Description</th>
    <th>Location</th>
    <th>Created At</th>
</tr>

<?php
$sql = "SELECT * FROM help_requests ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>".$row['request_id']."</td>
        <td>".$row['user_id']."</td>
        <td>".$row['title']."</td>
        <td>".$row['description']."</td>
        <td>".$row['location']."</td>
        <td>".$row['created_at']."</td>
    </tr>";
}
?>
</table>
