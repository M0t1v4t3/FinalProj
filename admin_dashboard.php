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
    <style>
        .admin-nav {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
            margin: 2rem 0;
        }

        .admin-nav a {
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .admin-nav a:not(.active) {
            background: white;
            border: 2px solid #FF6B6B;
            color: #FF6B6B;
        }

        .admin-nav a:hover {
            background: #FF6B6B;
            color: white;
            transform: translateY(-2px);
        }

        .admin-nav a.active {
            background: linear-gradient(135deg, #FF6B6B, #FF8E8E);
            color: white;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        .admin-dashboard {
            padding: 2rem;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<main>
    <h2 style="text-align:center;">Admin Dashboard</h2>

    <div class="admin-nav">
        <a href="?section=home" class="<?= $section == 'home' ? 'active' : '' ?>">Home</a>
        <a href="?section=animals" class="<?= $section == 'animals' ? 'active' : '' ?>">Manage Animals</a>
        <a href="?section=adoptions" class="<?= $section == 'adoptions' ? 'active' : '' ?>">Adoption Requests</a>
        <a href="?section=volunteers" class="<?= $section == 'volunteers' ? 'active' : '' ?>">Volunteers</a>
    </div>

    <div class="admin-dashboard">
        <?php
        $allowed_sections = ['home', 'animals', 'adoptions', 'volunteers'];
        if (in_array($section, $allowed_sections)) {
            $file = "admin_" . $section . ".php";
            if (file_exists($file)) {
                include($file);
            } else {
                echo "<p style='color:red;'>Error: Section file '$file' not found.</p>";
            }
        } else {
            echo "<p>Section not recognized.</p>";
        }
        ?>
    </div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>
