<?php
require_once __DIR__ . '/../config.php';
include __DIR__ . '/../includes/header.php';

$res = $conn->query("SELECT name,blood_group,location,phone,created_at FROM blood_donors ORDER BY created_at DESC");
?>

<h2 class="page-title">Blood Bank</h2>

<div style="max-width:520px;margin-bottom:30px;">
  <form method="post" action="../actions/add_blood_donor.php">
    <input type="text" name="name" placeholder="Donor name" required>
    <input type="text" name="blood_group" placeholder="Blood group (A+, O+)" required>
    <input type="text" name="location" placeholder="Location">
    <input type="text" name="phone" placeholder="Phone" required>
    <button type="submit">Add Donor</button>
  </form>
</div>

<?php if ($res && $res->num_rows>0): ?>
<table class="table">
<tr><th>Name</th><th>Group</th><th>Location</th><th>Phone</th><th>Date</th></tr>
<?php while($d=$res->fetch_assoc()): ?>
<tr>
  <td><?= htmlspecialchars($d['name']) ?></td>
  <td><?= htmlspecialchars($d['blood_group']) ?></td>
  <td><?= htmlspecialchars($d['location']) ?></td>
  <td><?= htmlspecialchars($d['phone']) ?></td>
  <td><?= htmlspecialchars($d['created_at']) ?></td>
</tr>
<?php endwhile; ?>
</table>
<?php else: ?>
<p>No donors listed.</p>
<?php endif; ?>

<?php include __DIR__ . '/../includes/footer.php'; ?>
