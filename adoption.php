<?php include('header.php');
include 'db.php';
 ?>
<main>
    <h2>Adoption Center</h2>
    <div class="form-container">
        <p style="text-align: center; margin-bottom: 2rem; color: #666;">
            Ready to give a rescued animal a loving home? Fill out our adoption application below.
        </p>
        
        <form action="process_adoption.php" method="post">
            <input type="text" name="name" placeholder="Your Full Name" required>
            <input type="email" name="email" placeholder="Your Email Address" required>
            <input type="tel" name="phone" placeholder="Phone Number" required>
            <textarea name="message" placeholder="Tell us why you want to adopt and about your living situation..." required></textarea>
            <button type="submit">Submit Application</button>
        </form>
    </div>
</main>
<?php include('footer.php'); ?>
