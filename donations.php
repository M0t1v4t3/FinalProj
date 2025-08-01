<?php include('header.php');
include 'db.php';
 ?>
<main>
    <h2>Support Our Mission</h2>
    <div class="form-container">
        <p style="text-align: center; margin-bottom: 2rem; color: #666;">
            Your generous donation helps us provide food, medical care, and shelter for rescued animals.
        </p>
        
        <form action="process_donation.php" method="post">
            <input type="text" name="donor_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="number" name="amount" placeholder="Donation Amount (₱)" min="1" required>
            <textarea name="message" placeholder="Special message or dedication (optional)"></textarea>
            <button type="submit">Donate Now</button>
        </form>
    </div>
</main>
<?php include('footer.php'); ?>
