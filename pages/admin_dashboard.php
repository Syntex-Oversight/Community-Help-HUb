<?php
if (!isset($_SESSION['admin_id'])) {
    echo "<p>Please login first. <a href='index.php?page=admin_login'>Login</a></p>";
    return;
}
?>

<h2>Welcome Admin, <?php echo $_SESSION['name']; ?> 👋</h2>

<h3>All Users</h3>
<table border="1" cellpadding="5">
<tr>
    <th>User ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Created At</th>
</tr>
<?php
$sql = "SELECT * FROM users ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>".$row['user_id']."</td>
        <td>".$row['name']."</td>
        <td>".$row['email']."</td>
        <td>".$row['role']."</td>
        <td>".$row['created_at']."</td>
    </tr>";
}
?>
</table>

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
