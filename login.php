<!DOCTYPE html>
<?php include('header.php');
include 'db.php';
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Saving Strays</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h2>Login to Your Account</h2>
        <div class="form-container animate-slide-up">
            <form action="login_process.php" method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <p style="text-align:center; margin-top:1rem;">
                Don't have an account? <a href="signup.php" style="color: #FF6B6B;">Sign up here</a>
            </p>
        </div>
    </main>

    <footer>
        <p>&copy; <?= date("Y") ?> Saving Strays. All rights reserved.</p>
    </footer>

</body>
</html>