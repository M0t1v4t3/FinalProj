<?php
$host = 'localhost';
$db   = 'saving_strays';
$user = 'root';       // Change if using a different username
$pass = '';           // Change if you have a MySQL password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Add MySQLi connection (for current files that use $conn)
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("MySQLi Connection failed: " . $conn->connect_error);
}
?>