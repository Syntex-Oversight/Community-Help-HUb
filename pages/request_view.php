<?php
include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../config.php';

$request_id = $_GET['id'];

$request = $conn->query(
    "SELECT * FROM help_requests WHERE request_id = $request_id"
)->fetch_assoc();
?>

<h2><?= $request['title']; ?></h2>

<p><b>Type:</b> <?= ucfirst($request['request_type']); ?></p>
<p><b>Description:</b> <?= $request['description']; ?></p>
<p><b>Location:</b> <?= $request['location']; ?></p>
<p><b>Status:</b> <?= ucfirst($request['status']); ?></p>

<hr>

<h3>Offer a Donation</h3>

<form method="POST" action="../actions/add_donation.php">

    <input type="hidden" name="request_id" value="<?= $request_id; ?>">

    <label>Donation Item</label>
    <input type="text" name="item" required>

    <label>Quantity</label>
    <input type="number" name="quantity" value="1">

    <label>Note (optional)</label>
    <textarea name="note" rows="3"></textarea>

    <button type="submit">Submit Donation</button>
</form>

<?php include __DIR__ . '/../includes/footer.php'; ?>
