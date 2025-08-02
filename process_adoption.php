<?php
include 'db.php';

// Get and sanitize input
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$phone = isset($_POST['phone']) ? $conn->real_escape_string($_POST['phone']) : '';
$message = $conn->real_escape_string($_POST['message']);

// Insert into database
$sql = "INSERT INTO adoptions (name, email, phone, message) 
        VALUES ('$name', '$email', '$phone', '$message')";

if ($conn->query($sql)) {
    // Success message with home button
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adoption Application Submitted</title>
        <style>
            body {
                font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f9f9f9;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .message-container {
                text-align: center;
                background-color: white;
                padding: 40px;
                border-radius: 12px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
                max-width: 500px;
            }
            h2 {
                color: #4CAF50;
                margin-bottom: 20px;
            }
            p {
                color: #555;
                margin-bottom: 30px;
                font-size: 18px;
            }
            .home-btn {
                display: inline-block;
                padding: 12px 24px;
                background: linear-gradient(to right, #f15e64, #e1758f);
                color: white;
                text-decoration: none;
                border-radius: 50px;
                font-weight: 600;
                transition: all 0.3s;
            }
            .home-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            }
        </style>
    </head>
    <body>
        <div class="message-container">
            <h2>Adoption Application Submitted!</h2>
            <p>Thank you for your interest in adopting. We will review your application and contact you soon.</p>
            <a href="index.php" class="home-btn">Back to Home Page</a>
        </div>
    </body>
    </html>';
} else {
    // Error message with try again button
    echo '<div style="text-align: center; padding: 40px; font-family: Arial, sans-serif;">
            <h2 style="color: #f44336;">Submission Error</h2>
            <p>There was a problem processing your application. Please try again.</p>
            <a href="adoption.php" style="display: inline-block; margin-top: 20px; padding: 12px 24px; background-color: #f15e64; color: white; text-decoration: none; border-radius: 50px;">Try Again</a>
          </div>';
}

$conn->close();
?>