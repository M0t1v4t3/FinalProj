<?php include('header.php'); 
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

        <div class="animal-card">
            <img src="https://savingstraysorg.wordpress.com/wp-content/uploads/2024/08/63.png" alt="Nicole">
            <div class="animal-info">
                <h4>Nicole</h4>
                <p>Nicole is the "Queen of Building K." A calm and observant cat who enjoys lounging in cozy corners.</p>
                <div class="animal-tags">
                    <span class="tag">Friendly</span>
                    <span class="tag">Timid</span>
                    <span class="tag">Calm</span>
                </div>
            </div>
        </div>

        <div class="animal-card">
            <img src="https://savingstraysorg.wordpress.com/wp-content/uploads/2024/08/53.png" alt="Maritess">
            <div class="animal-info">
                <h4>Maritess</h4>
                <p>Marites, well, is a marites. SHe's a friendly cat who lets you know what she wants.</p>
                <div class="animal-tags">
                    <span class="tag">Friendly</span>
                    <span class="tag">Calm</span>
                    <span class="tag">Affectionate</span>
                </div>
            </div>
        </div>

        <div class="animal-card">
            <img src="https://savingstraysorg.wordpress.com/wp-content/uploads/2024/08/90.png" alt="Missy">
            <div class="animal-info">
                <h4>Missy</h4>
                <p>Missy is a gentle introvert who is very quiet and reserved.</p>
                <div class="animal-tags">
                    <span class="tag">Gentle</span>
                    <span class="tag">Introverted</span>
                    <span class="tag">Patient</span>
                </div>
            </div>
        </div>

    </div>
</main>
<?php include('footer.php'); ?>
