<?php
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND role='admin'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $admin = mysqli_fetch_assoc($result);
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['user_id'];
            $_SESSION['name'] = $admin['name'];
            header("Location: index.php?page=admin_dashboard");
            exit();
        } else {
            echo "<p>Incorrect Password!</p>";
        }
    } else {
        echo "<p>No admin found with this email!</p>";
    }
}
?>

<h2>Admin Login</h2>
<form method="POST">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit" name="login">Login</button>
</form>
