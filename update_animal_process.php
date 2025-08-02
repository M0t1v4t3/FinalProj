<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $image_url = trim($_POST['image_url']);
    $tags = trim($_POST['tags']);

    try {
        $stmt = $pdo->prepare("UPDATE animals SET name = :name, description = :description, image_url = :image_url, tags = :tags WHERE id = :id");
        $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':image_url' => $image_url,
            ':tags' => $tags,
            ':id' => $id
        ]);

        header("Location: admin_dashboard.php?section=animals&updated=1");
        exit();
    } catch (PDOException $e) {
        echo "Error updating animal: " . $e->getMessage();
    }
}
?>
