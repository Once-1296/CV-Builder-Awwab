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
            max-width: 400px;
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
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #cccccc;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
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

        /* Optional: error message styling if you ever need it inline */
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