<?php
require_once __DIR__ . '/../config.php';
include __DIR__ . '/../includes/header.php';
?>

<section class="features">
    <h2>Create Help Request</h2>

    <div class="card">
        <form method="POST" action="../actions/save_help_request.php" class="form-grid">

            <div>
                <label>Request Type</label>
                <select name="request_type">
                    <option value="">Select</option>
                    <option value="donation">Donation</option>
                    <option value="volunteer">Volunteer</option>
                    <option value="alert">Alert</option>
                </select>
            </div>

            <div>
                <label>Title</label>
                <input type="text" name="title" required>
            </div>

            <div style="grid-column: span 2;">
                <label>Description</label>
                <textarea name="description" rows="4" required></textarea>
            </div>

            <div>
                <label>Category</label>
                <input type="text" name="category">
            </div>

            <div>
                <label>Location</label>
                <input type="text" name="location">
            </div>

            <div>
                <label>Priority</label>
                <select name="priority">
                    <option value="low">Low</option>
                    <option value="normal" selected>Normal</option>
                    <option value="high">High</option>
                </select>
            </div>

            <div style="grid-column: span 2;" style="background-color: green;">
                <button class="primary-btn" type="submit">
                    Submit Request
                </button>
            </div>

        </form>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
