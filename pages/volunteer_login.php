<?php
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND role='volunteer'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $vol = mysqli_fetch_assoc($result);
        if (password_verify($password, $vol['password'])) {
            $_SESSION['volunteer_id'] = $vol['user_id'];
            $_SESSION['name'] = $vol['name'];
            header("Location: index.php?page=volunteer_dashboard");
            exit();
        } else {
            echo "<p>Incorrect Password!</p>";
        }
    } else {
        echo "<p>No volunteer found with this email!</p>";
    }
}
?>

<h2>Volunteer Login</h2>
<form method="POST">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit" name="login">Login</button>
</form>
