<?php if(!isset($_SESSION['user_id'])){ header("Location:index.php?page=login"); exit; } ?>
<h2>My Profile</h2>
<div class="profile-box">
    <p><strong>Name:</strong> <?php echo htmlspecialchars($_SESSION['name']); ?></p>
    <p><strong>Email:</strong> <?php
        $sql = "SELECT email, phone, address FROM users WHERE user_id = ?";
        $st = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($st,"i", $_SESSION['user_id']);
        mysqli_stmt_execute($st);
        $r = mysqli_stmt_get_result($st);
        $u = mysqli_fetch_assoc($r);
        echo htmlspecialchars($u['email']); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($u['phone']); ?></p>
    <p><strong>Address:</strong> <?php echo htmlspecialchars($u['address']); ?></p>
</div>
