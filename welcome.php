<?php
session_start();
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="welcome-box">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['first_name']); ?>!</h1>
            <p>You have successfully logged in.</p>
        </div>
        <a href="logout.php" class="btn">Logout</a>
        <a href="dtiproj2.php" target="_blank" class="btn">ResumePro</a>
    </div>
</body>
</html>
