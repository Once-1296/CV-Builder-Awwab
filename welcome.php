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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }

        .container {
            text-align: center;
        }

        .welcome-box {
            background: #ffffff;
            padding: 50px 40px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            max-width: 500px;
            margin: 0 auto 30px;
        }

        h1 {
            font-size: 30px;
            color: #333333;
            margin-bottom: 15px;
        }

        p {
            font-size: 18px;
            color: #555555;
        }

        .btn {
            display: inline-block;
            background: #667eea;
            color: #ffffff;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            margin: 8px;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #5a67d8;
        }
    </style>
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