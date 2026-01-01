<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/auth_check.php';
include __DIR__ . '/../includes/header.php';

$sql = "SELECT item, quantity, note, created_at FROM donations ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<section class="features">
    <h2>Community Donations</h2>

    <div class="card">
        <form method="POST" action="../actions/add_donation.php" class="form-grid">
            <input type="text" name="item" placeholder="Item (Rice, Clothes)" required>
            <input type="number" name="quantity" placeholder="Quantity" required>
            <textarea name="note" placeholder="Optional note"></textarea>
            <button class="primary-btn" type="submit">Add Donation</button>
        </form>
    </div>

    <br>

    <div class="card">
        <h3>Recent Donations</h3>

        <?php if ($result && $result->num_rows > 0): ?>
            <table class="table">
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Note</th>
                    <th>Date</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['item']) ?></td>
                    <td><?= (int)$row['quantity'] ?></td>
                    <td><?= htmlspecialchars($row['note']) ?></td>
                    <td><?= $row['created_at'] ?></td>
                </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No donations yet.</p>
        <?php endif; ?>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
