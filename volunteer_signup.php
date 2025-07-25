<?php
include 'db.php';

$name = $_POST['fullname'];
$email = $_POST['email'];

$sql = "INSERT INTO volunteers (name, email) VALUES ('$name', '$email')";
$conn->query($sql);

echo "Thank you for volunteering!";
?>
