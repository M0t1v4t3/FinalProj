<?php
include('header.php');
include('db.php');

// Check for ID in URL
if (!isset($_GET['id'])) {
    echo "<p style='text-align: center; color: red;'>No animal selected for editing.</p>";
    include('footer.php');
    exit();
}

$animal_id = $_GET['id'];

// Fetch animal data using PDO
try {
    $stmt = $pdo->prepare("SELECT * FROM animals WHERE id = :id");
    $stmt->execute([':id' => $animal_id]);
    $animal = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$animal) {
        echo "<p style='text-align: center; color: red;'>Animal not found.</p>";
        include('footer.php');
        exit();
    }
} catch (PDOException $e) {
    echo "<p style='text-align: center; color: red;'>Error fetching animal: " . $e->getMessage() . "</p>";
    include('footer.php');
    exit();
}
?>

<main>
    <h2>Edit Animal - <?= htmlspecialchars($animal['name']) ?></h2>
    <p style="text-align: center; margin-bottom: 2rem; color: #666;">
        Update the animal's details and click "Save Changes".
    </p>

    <div class="form-container">
        <form action="update_animal_process.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($animal['id']) ?>">

            <label for="name">Animal Name</label>
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($animal['name']) ?>" required>

            <label for="description">Description</label>
            <textarea name="description" id="description" required><?= htmlspecialchars($animal['description']) ?></textarea>

            <label for="image_url">Image URL</label>
            <input type="text" name="image_url" id="image_url" value="<?= htmlspecialchars($animal['image_url']) ?>" required>

            <label for="tags">Tags (comma-separated)</label>
            <input type="text" name="tags" id="tags" value="<?= htmlspecialchars($animal['tags']) ?>">

            <button type="submit">Save Changes</button>
        </form>
    </div>
</main>

<?php include('footer.php'); ?>
