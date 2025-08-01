<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'is_admin' => $user['is_admin']
        ];
        header("Location: index.php");
        exit;
    } else {
        echo "<p class='error-message'>Invalid email or password.</p>";
    }
}
?>