<?php 
include('header.php'); 
include('db.php'); // Assumes $pdo is the correct PDO connection
?>

<main>
    <h2 style="text-align:center;">Manage Rescued Animals</h2>

    <?php if (isset($_GET['added']) && $_GET['added'] == 1): ?>
        <p style="text-align:center; color:green;">✅ Animal added successfully!</p>
    <?php elseif (isset($_GET['deleted']) && $_GET['deleted'] == 1): ?>
        <p style="text-align:center; color:orange;">🗑️ Animal deleted successfully!</p>
    <?php elseif (isset($_GET['updated']) && $_GET['updated'] == 1): ?>
        <p style="text-align:center; color:blue;">✏️ Animal updated successfully!</p>
    <?php endif; ?>

    <!-- ADD NEW ANIMAL -->
    <section style="max-width: 800px; margin: 2rem auto;">
        <h3>Add New Animal</h3>
        <form method="POST" action="add_animal_process.php">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required style="width:100%; padding:0.5rem;"><br><br>

            <label for="description">Description:</label><br>
            <textarea id="description" name="description" required style="width:100%; padding:0.5rem;"></textarea><br><br>

            <label for="image_url">Image URL:</label><br>
            <input type="url" id="image_url" name="image_url" required style="width:100%; padding:0.5rem;"><br><br>

            <label for="tags">Tags (comma-separated):</label><br>
            <input type="text" id="tags" name="tags" style="width:100%; padding:0.5rem;"><br><br>

            <button type="submit" style="padding:0.6rem 1.2rem;">➕ Add Animal</button>
        </form>
    </section>

    <hr style="margin: 3rem 0;">

    <!-- CURRENT ANIMALS -->
    <section style="padding: 0 2rem;">
        <h3 style="text-align:center;">Current Rescued Animals</h3>
        <div class="animals-grid">
            <?php
            try {
                $stmt = $pdo->query("SELECT * FROM animals ORDER BY id DESC");
                $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($animals) === 0) {
                    echo "<p style='text-align:center; color:gray;'>No animals found.</p>";
                }

                foreach ($animals as $animal) {
                    echo '<div class="animal-card">';
                    echo '<img src="' . htmlspecialchars($animal['image_url']) . '" alt="' . htmlspecialchars($animal['name']) . '">';
                    echo '<div class="animal-info">';
                    echo '<h4>' . htmlspecialchars($animal['name']) . '</h4>';
                    echo '<p>' . htmlspecialchars($animal['description']) . '</p>';

                    if (!empty($animal['tags'])) {
                        $tags = explode(',', $animal['tags']);
                        echo '<div class="animal-tags">';
                        foreach ($tags as $tag) {
                            echo '<span class="tag">' . htmlspecialchars(trim($tag)) . '</span>';
                        }
                        echo '</div>';
                    }

                    echo '<div class="action-buttons">';
                    echo '<a href="edit_animal.php?id=' . urlencode($animal['id']) . '" class="edit-btn">✏️ Edit</a>';
                    echo '<a href="delete_animal.php?id=' . urlencode($animal['id']) . '" onclick="return confirm(\'Are you sure you want to delete this animal?\');" class="delete-btn">🗑️ Delete</a>';
                    echo '</div>';

                    echo '</div></div>';
                }
            } catch (PDOException $e) {
                echo "<p style='text-align:center; color:red;'>Error: " . $e->getMessage() . "</p>";
            }
            ?>
        </div>
    </section>
</main>

<!-- STYLES -->
<style>
    .animals-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .animal-card {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        display: flex;
        flex-direction: column;
    }

    .animal-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .animal-info {
        padding: 1rem;
    }

    .animal-tags .tag {
        background-color: #eee;
        border-radius: 20px;
        padding: 0.3rem 0.7rem;
        margin: 0.3rem 0.3rem 0 0;
        font-size: 0.8rem;
        display: inline-block;
    }

    .action-buttons {
        margin-top: 1rem;
        display: flex;
        gap: 1rem;
    }

    .edit-btn, .delete-btn {
        text-decoration: none;
        font-size: 0.9rem;
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
    }

    .edit-btn {
        background-color: #eef;
        color: #0055cc;
    }

    .delete-btn {
        background-color: #fee;
        color: #cc0000;
    }

    .edit-btn:hover {
        background-color: #dde;
    }

    .delete-btn:hover {
        background-color: #fdd;
    }
</style>

<?php include('footer.php'); ?>
    