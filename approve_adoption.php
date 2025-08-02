<?php
include('../db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $pdo->prepare("UPDATE adoptions SET status = 'Approved' WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: ../admin_dashboard.php?section=adoptions&approved=1");
    exit();
} else {
    echo "Invalid adoption ID.";
}
?>
