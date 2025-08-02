<?php
include 'db.php';

// Get and sanitize input
$name = $conn->real_escape_string($_POST['fullname']);
$email = $conn->real_escape_string($_POST['email']);
$phone = isset($_POST['phone']) ? $conn->real_escape_string($_POST['phone']) : '';
$availability = isset($_POST['availability']) ? $conn->real_escape_string($_POST['availability']) : '';

// Insert into database
$sql = "INSERT INTO volunteers (name, email, phone, availability, signup_date) 
        VALUES ('$name', '$email', '$phone', '$availability', NOW())";

if ($conn->query($sql)) {
    // Success message with back link
    echo '<div style="text-align: center; padding: 20px; font-family: Arial, sans-serif;">';
    echo '<h2 style="color: #4CAF50;">Thank you for volunteering!</h2>';
    echo '<p>We appreciate your willingness to help our cause.</p>';
    echo '<a href="index.php" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #f15e64; color: white; text-decoration: none; border-radius: 5px;">Back to Home Page</a>';
    echo '</div>';
} else {
    // Error message with back link
    echo '<div style="text-align: center; padding: 20px; font-family: Arial, sans-serif;">';
    echo '<h2 style="color: #f44336;">Registration Error</h2>';
    echo '<p>There was a problem processing your registration.</p>';
    echo '<p>Error: ' . $conn->error . '</p>';
    echo '<a href="volunteer.php" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #f15e64; color: white; text-decoration: none; border-radius: 5px;">Try Again</a>';
    echo '</div>';
}

$conn->close();
?>