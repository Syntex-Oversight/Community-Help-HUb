<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/auth_check.php';
include __DIR__ . '/../includes/header.php';

$result = $conn->query("SELECT skill, availability FROM volunteers");
?>

<section class="features">
    <h2>Volunteers</h2>

    <div class="card-grid">

        <div class="card">
            <h3>Join as Volunteer</h3>

            <form method="POST" action="../actions/add_volunteer.php" class="form-grid">
                <input type="text" name="skill" placeholder="Skill (First Aid)" required>
                <input type="text" name="availability" placeholder="Availability (Weekends)" required>
                <button class="primary-btn" type="submit">Join</button>
            </form>
        </div>

        <div class="card">
            <h3>Volunteer List</h3>

            <?php if ($result && $result->num_rows > 0): ?>
                <table class="table">
                    <tr>
                        <th>Skill</th>
                        <th>Availability</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['skill']) ?></td>
                        <td><?= htmlspecialchars($row['availability']) ?></td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p>No volunteers yet.</p>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
