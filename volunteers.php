<?php include('header.php'); 
include 'db.php';
?>
<main>
    <h2>Join Our Volunteer Team</h2>
    <div class="form-container">
        <p style="text-align: center; margin-bottom: 2rem; color: #666;">
            Become part of our amazing volunteer community and help make a difference in the lives of rescued animals.
        </p>
        
        <form action="volunteer_signup.php" method="post">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="tel" name="phone" placeholder="Phone Number" required>
            <textarea name="availability" placeholder="Tell us about your availability and how you'd like to help..." required></textarea>
            <button type="submit">Join Our Team</button>
        </form>
    </div>
</main>
<?php include('footer.php'); ?>
