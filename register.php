<?php
require 'db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate passwords match
    if($password !== $confirm_password) {
        header("Location: signup.php?error=1");
        exit();
    }

    // Validate email format
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: signup.php?error=2");
        exit();
    }

    // Check if username or email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    if($stmt->rowCount() > 0) {
        header("Location: signup.php?error=3");
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user
    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, username, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$first_name, $last_name, $email, $username, $hashed_password]);

    // Redirect to login page with success message
    header("Location: index.php?registered=1");
    exit();
}
?>