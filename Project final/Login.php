<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1>Sign up</h1>

        <?php if (isset ($_SESSION['Loginerror'])) { ?>
            <div class="alert alert-danger alert-customer" role="alert">
                <?php
                echo $_SESSION['Loginerror'];
                unset ($_SESSION['Loginerror']);
                ?>
            </div>
        <?php } ?>

        <form action="Loginaction.php" method="post">
            <div>

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>

                <label for="password" class="password">Password</label>
                <input type="password" id="password" name="password" required>

                <button type="submit" class="signup-button">Sign In</button>

                <h5><a href="#">Forgot your password?</a></h5>

                <button class="create-button" onclick="window.location.href='Create.php'"> Create on </button>
            </div>
        </form>
    </div>
</body>
</html>
