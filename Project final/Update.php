<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="Update.css">
</head>
<body>
    <div class="box-main" >
       <h2 class="title-main" >Update your Profile</h2 class="title-main" >

       <?php if (isset ($_SESSION['successful'])) { ?>
                    <div class="alert alert-success alert-customer" role="alert">
                        <?php
                        echo $_SESSION['error'];
                        unset ($_SESSION['error']);
                        ?>
                    </div>
                <?php } ?>

                <?php if (isset ($_SESSION['errorupdate'])) { ?>
                    <div class="alert alert-danger alert-customer" role="alert">
                        <?php
                        echo $_SESSION['error'];
                        unset ($_SESSION['error']);
                        ?>
                    </div>
                <?php } ?>
                
        <form action="Updateaction.php" method="post" ></form>
            <div class="update-1" > 

                <label for="Username" class="UserName" >Username</label>
                <input type="text" name="Username" id="Username">

                <label for="Password" class="Password" >Password</label>
                <input type="password" name="Password" id="Password">

                <label for="ConfirmPassword" class="ConfirmPassword" >ConfirmPassword</label>
                <input type="password" name="ConfirmPassword" id="ConfirmPassword">

                <label for="Address" class="Address" >Address</label>
                <input type="text" name="Address" id="Address">

                <button class="btn-update" onclick="window.location.href = 'Updateaction.php' ">Update</button>
                
                <a href="Account.php" class="back-profile" >Back To Profile </a>

        </div>
    </div>
</body>
</html>