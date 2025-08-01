<?php include('header.php');
include 'db.php';
 ?>
<main>
    <h2>Create Your Account</h2>
    <div class="form-container">
        <p style="text-align: center; margin-bottom: 2rem; color: #666;">
            Join our community to stay updated on rescue activities and adoption opportunities.
        </p>
        
        <form action="process_signup.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Create Account</button>
        </form>
        
        <p style="text-align: center; margin-top: 1rem; color: #666;">
            Already have an account? <a href="login.php" style="color: #FF6B6B;">Sign in here</a>
        </p>
    </div>
</main>
<?php include('footer.php'); ?>
