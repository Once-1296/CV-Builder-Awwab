<?php
session_start();
require 'db_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['first_name'] = $user['first_name'];
        header("Location: welcome.php");
        exit();
    } else {
        header("Location: index.php?error=1");
        exit();
    }
}
?>