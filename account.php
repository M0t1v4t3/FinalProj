<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Account - Saving Strays</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php'; ?>

<main>
    <h2>Welcome, <?= htmlspecialchars($user['username']) ?>!</h2>
    <div class="form-container">
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>User ID:</strong> <?= htmlspecialchars($user['id']) ?></p>
        <p>You are now logged in. Feel free to explore or <a href="logout.php" class="btn-secondary">Logout</a>.</p>
    </div>
</main>

<footer>
    <p>&copy; <?= date("Y") ?> Saving Strays. All rights reserved.</p>
</footer>
</body>
</html>