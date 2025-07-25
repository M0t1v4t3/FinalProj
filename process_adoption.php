<?php
include include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO adoptions (name, email, message) VALUES ('$name', '$email', '$message')";
$conn->query($sql);

echo "Adoption request submitted successfully.";
?>
