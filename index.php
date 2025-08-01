<?php include('header.php');
include 'db.php';
 ?>
<main>
    <div class="hero-section">
        <h2>Every Stray Deserves Love</h2>
        <p>Join our mission to rescue, rehabilitate, and rehome stray animals in need</p>
        <div class="cta-buttons">
            <a href="adoption.php" class="btn">Adopt Now</a>
            <a href="donations.php" class="btn btn-secondary">Donate Today</a>
        </div>
    </div>

    <section>
        <h2>How You Can Help</h2>
        <div class="card-grid">
            <div class="card">
                <h3>Adopt a Pet</h3>
                <p>Give a rescued animal a forever home filled with love and care. Our adoption process ensures the perfect match for both you and your new companion.</p>
                <a href="adoption.php" class="btn">Find Your Pet</a>
            </div>
            
            <div class="card">
                <h3>Make a Donation</h3>
                <p>Support our rescue operations with food, medical care, and shelter. Every donation directly helps save and improve lives.</p>
                <a href="donations.php" class="btn">Donate Now</a>
            </div>
            
            <div class="card">
                <h3>Volunteer</h3>
                <p>Join our team of dedicated volunteers helping animals in need. Whether you have an hour or a day, your help makes a difference.</p>
                <a href="volunteers.php" class="btn">Join Us</a>
            </div>
        </div>
    </section>
</main>
<?php include('footer.php'); ?>
