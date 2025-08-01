<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['is_admin'] != 1) {
    header("Location: login.php");
    exit();
}

$section = isset($_GET['section']) ? $_GET['section'] : 'home';
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Saving Strays</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include 'header.php'; ?>

<main>
    <h2>Admin Dashboard</h2>

    <div class="admin-nav">
        <a href="?section=home" class="<?= $section == 'home' ? 'active' : '' ?>">Home</a>
        <a href="?section=animals" class="<?= $section == 'animals' ? 'active' : '' ?>">Manage Animals</a>
        <a href="?section=adoptions" class="<?= $section == 'adoptions' ? 'active' : '' ?>">Adoption Requests</a>
        <a href="?section=volunteers" class="<?= $section == 'volunteers' ? 'active' : '' ?>">Volunteers</a>
    </div>

    <div class="admin-dashboard animate-slide-up">
        <?php
        if ($section == 'home') {
            echo "<p>Welcome, Admin. Select a section to manage site data.</p>";
        } elseif ($section == 'animals') {
            include('admin_sections/admin_animals.php');
        } elseif ($section == 'adoptions') {
            include('admin_sections/admin_adoptions.php');
        } elseif ($section == 'volunteers') {
            include('admin_sections/admin_volunteers.php');
        } else {
            echo "<p>Section not found.</p>";
        }
        ?>
    </div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>