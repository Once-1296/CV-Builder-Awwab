<?php
session_start();
if(isset($_SESSION['username'])) {
    header("Location: welcome.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h1>Login</h1>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
            <div class="bottom-text">
                Don't have an account? <a href="signup.php">Sign up</a>
            </div>
        </div>
    </div>

    <?php if(isset($_GET['error']) && $_GET['error'] == 1): ?>
        <script>alert('Invalid username or password!');</script>
    <?php endif; ?>
</body>
</html>