<?php
require_once "config.php";
require_once "includes/auth_check.php";
include "includes/header.php";
?>

<section class="hero">
    <div class="hero-content">
        <h1>Helping Communities,<br>One Step at a Time</h1>
        <p>
            Community Help Hub connects people who need help with people
            who care — safely, quickly, and locally.
        </p>
        <a href="pages/create_request.php" class="primary-btn">
            Create Help Request
        </a>
    </div>
</section>

<section class="features">
    <h2>What You Can Do</h2>

    <div class="card-grid">

        <div class="card">
            <span>🤝</span>
            <h3>Request Help</h3>
            <p>Ask for food, money, blood or urgent support.</p> <br>
            <a class="primary-btn"href="pages/create_request.php">Create</a>
        </div>

        <div class="card">
            <span>🎁</span>
            <h3>Donations</h3>
            <p>Donate items or explore donation needs.</p> <br>
            <a class="primary-btn" href="pages/donations.php">Explore</a>
        </div>

        <div class="card">
            <span>🩸</span>
            <h3>Blood Bank</h3>
            <p>Find donors or register as a donor.</p> <br>
            <a class="primary-btn"href="pages/blood_bank.php">Open</a>
        </div>

        <div class="card">
            <span>🙋‍♂️</span>
            <h3>Volunteers</h3>
            <p>Join volunteers helping communities grow.</p> <br>
            <a class="primary-btn" href="pages/volunteers.php">Join</a>
        </div>

    </div>
</section>

<?php include "includes/footer.php"; ?>
