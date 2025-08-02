<?php
include('../db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("UPDATE adoptions SET status = 'Declined' WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: ../admin_dashboard.php?section=adoptions&declined=1");
    exit();
} else {
    echo "Invalid adoption ID.";
}
?>
