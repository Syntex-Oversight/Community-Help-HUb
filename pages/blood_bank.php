<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/auth_check.php';
include __DIR__ . '/../includes/header.php';

$result = $conn->query("SELECT name, blood_group, location FROM blood_donors");
?>

<section class="features">
    <h2>Blood Bank</h2>

    <div class="card-grid">

        <div class="card">
            <h3>Register as Donor</h3>

            <form method="POST" action="../actions/add_donor.php" class="form-grid">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="text" name="blood_group" placeholder="Blood Group (A+, O-)" required>
                <input type="text" name="location" placeholder="Location" required>
                <button class="primary-btn" type="submit">Register</button>
            </form>
        </div>

        <div class="card">
            <h3>Available Donors</h3>

            <?php if ($result && $result->num_rows > 0): ?>
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Blood</th>
                        <th>Location</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['blood_group']) ?></td>
                        <td><?= htmlspecialchars($row['location']) ?></td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p>No donors found.</p>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
