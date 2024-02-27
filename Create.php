<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Create.css">
  <title>Create account</title>
</head>
<body>
  <div class="container">
    <h1>Sign up</h1>

    
    <?php if (isset ($_SESSION['error'])) { ?>
            <div class="alert alert-danger alert-customer" role="alert">
                <?php
                echo $_SESSION['error'];
                unset ($_SESSION['error']);
                ?>
            </div>
      <?php } ?>

    <form action="Createaction.php" method="post">


    <div>
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required>  

      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>

      <label for="Confirm Password">Confirm Password</label>
      <input type="password" id="confirmpassword" name="confirmpassword" required>

      <label for="address">Address</label>
      <input type="text" id="address" name="address" required>

      <button type="submit" class="signup-button">Sign up</button>

      <h5><a href="Login.php">Back to login</a></h5>
      
    </div>
    </form>
   </div>
</body>
</html>
