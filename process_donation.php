<?php
include 'db.php';

$name = $_POST['donor_name'];
$amount = $_POST['amount'];

$sql = "INSERT INTO donations (name, amount) VALUES ('$name', '$amount')";
$conn->query($sql);

echo "Thank you for your donation!";
?>
