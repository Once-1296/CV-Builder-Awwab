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
        }

        .container {
            padding: 20px;
        }

        .form-box {
            background: #ffffff;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            max-width: 350px;
            width: 100%;
            text-align: center;
        }

        h1 {
            margin-bottom: 25px;
            color: #333333;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #555555;
            font-weight: 600;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #cccccc;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #667eea;
        }

        .btn {
            display: inline-block;
            background: #667eea;
            color: #ffffff;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #5a67d8;
        }

        .bottom-text {
            margin-top: 20px;
            font-size: 14px;
            color: #555555;
        }

        .bottom-text a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .bottom-text a:hover {
            color: #5a67d8;
        }

        /* Optional: error message styling if you ever need it later */
        .error-message {
            background: #ffe0e0;
            color: #cc0000;
            padding: 10px;
            margin-top: 15px;
            border-radius: 8px;
        }
    </style>
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