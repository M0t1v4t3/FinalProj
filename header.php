<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saving Strays</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <div class="header-content">
        <div class="logo-section">
            <img src="https://www.ivolunteer.com.ph/storage/logo_images/2y0nRfFMoMoxGRQ3FLnGL83CcGyHWmIbQEFS4aeq.png" alt="Saving Strays Logo">
            <h1>Saving Strays</h1>
        </div>
        <nav>
            <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="animals.php">Rescued Animals</a></li>
    <li><a href="adoption.php">Adoption</a></li>
    <li><a href="donations.php">Donations</a></li>
    <li><a href="volunteers.php">Volunteers</a></li>
    <li><a href="community.php">Community Map</a></li>
    <li><a href="directory.php">Directory</a></li>

    <?php if (isset($_SESSION['user'])): ?>
    <li><a href="account.php" class="btn-secondary">Account</a></li>

    <?php if ($_SESSION['user']['is_admin']): ?>
        <li><a href="admin_dashboard.php" class="btn-secondary">Admin</a></li>
    <?php endif; ?>

    <li><a href="logout.php" class="btn-secondary">Logout</a></li>
<?php else: ?>
    <li><a href="signup.php" class="btn-secondary">Sign Up</a></li>
    <li><a href="login.php" class="btn-secondary">Login</a></li>
<?php endif; ?>

            </ul>
        </nav>
    </div>
</header>