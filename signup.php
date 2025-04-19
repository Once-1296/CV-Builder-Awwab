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
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h1>Sign Up</h1>
            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <button type="submit" class="btn">Sign Up</button>
            </form>
            <div class="bottom-text">
                Already have an account? <a href="index.php">Login</a>
            </div>
        </div>
    </div>

    <?php if(isset($_GET['error'])): ?>
        <script>
            <?php if($_GET['error'] == 1): ?>
                alert('Passwords do not match!');
            <?php elseif($_GET['error'] == 2): ?>
                alert('Invalid email format!');
            <?php elseif($_GET['error'] == 3): ?>
                alert('Username or email already exists!');
            <?php endif; ?>
        </script>
    <?php endif; ?>
</body>
</html>