<?php
include 'db.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
$pdo->exec($sql);

echo "Account created successfully!";
header("Location: index.php");
exit;
?>
