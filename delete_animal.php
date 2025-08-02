<?php
include('db.php');

if (!isset($_GET['id'])) {
    echo "No animal selected for deletion.";
    exit();
}

$animal_id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM animals WHERE id = :id");
    $stmt->execute([':id' => $animal_id]);

    header("Location: admin_dashboard.php?section=animals&deleted=1");
    exit();
} catch (PDOException $e) {
    echo "Error deleting animal: " . $e->getMessage();
}
?>
