<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and sanitize form data
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $image_url = trim($_POST['image_url']);
    $tags = trim($_POST['tags']);

    // Validate inputs
    if (empty($name) || empty($description) || empty($image_url)) {
        echo "<p style='text-align: center; color: red;'>Please fill in all required fields.</p>";
        echo "<p style='text-align: center;'><a href='admin_dashboard.php?section=animals'>Go Back</a></p>";
        exit();
    }

    try {
        $sql = "INSERT INTO animals (name, description, image_url, tags) VALUES (:name, :description, :image_url, :tags)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':description' => $description,
            ':image_url' => $image_url,
            ':tags' => $tags
        ]);

        header("Location: admin_dashboard.php?section=animals&added=1");
        exit();
    } catch (PDOException $e) {
        echo "<p style='text-align: center; color: red;'>Error: " . $e->getMessage() . "</p>";
    }
} else {
    header("Location: admin_dashboard.php?section=animals");
    exit();
}
?>