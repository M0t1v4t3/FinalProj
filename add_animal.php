<?php include('header.php'); ?>

<main>
    <h2>Add New Animal</h2>

    <form action="add_animal_process.php" method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" required></textarea><br><br>

        <label>Image URL:</label><br>
        <input type="text" name="image_url" required><br><br>

        <label>Tags (comma-separated):</label><br>
        <input type="text" name="tags"><br><br>

        <button type="submit">Add Animal</button>
    </form>
</main>

<?php include('footer.php'); ?>
