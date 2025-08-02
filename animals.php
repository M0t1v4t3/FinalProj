<?php 
include('header.php'); 
include 'db.php';
?>

<main>
    <h2>Rescued Animals</h2>
    <p style="text-align: center; margin-bottom: 2rem; color: #666;">
        Meet the amazing animals we've rescued and cared for. They're all looking for their forever homes.
    </p>

    <style>
        .animals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            padding: 0 2rem;
        }

        .animal-card {
            background-color: #f9f9f9;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }

        .animal-card:hover {
            transform: scale(1.02);
        }

        .animal-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        .animal-info {
            padding: 1rem;
        }

        .animal-tags {
            margin-top: 0.5rem;
        }

        .tag {
            background-color: #e0e0e0;
            border-radius: 20px;
            padding: 0.3rem 0.7rem;
            margin-right: 0.5rem;
            font-size: 0.8rem;
            display: inline-block;
        }
    </style>

    <div class="animals-grid">
        <?php
        try {
            $stmt = $pdo->query("SELECT * FROM animals ORDER BY id DESC");
            while ($animal = $stmt->fetch(PDO::FETCH_ASSOC)) {
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

                echo '</div></div>';
            }
        } catch (PDOException $e) {
            echo "<p style='text-align: center; color: red;'>Failed to load animals: " . $e->getMessage() . "</p>";
        }
        ?>
    </div>
</main>

<?php include('footer.php'); ?>