<?php session_start(); ?>

<?php 
include 'Connection.php';

$Email = $_SESSION['email'];
$UserID = $_SESSION['UserID'];

$Check = "SELECT * FROM useraccount WHERE UserEmail = '$Email' AND UserID = '$UserID' ";
$result = mysqli_query($conn , $Check);


if (mysqli_num_rows($result) > 0){

    $data = mysqli_fetch_array($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="Account.css">
</head>
<body>
    <div class="box-main">
      <form action="Update.php" method="post">
        <h1 class = "Profile" >Profile</h1>

        <!-- อย่าลืมเปลี่ยนตัวแปล _SESSION -->
        <div class="text-name" >
            <label for="title-text" class="title-data" >Username <b class="datas" ><?php  echo $data['UserName'] ?></b></label>
            <label for="title-text" class="title-data" >Email <b class="datas" id="text-email" ><?php  echo $data['UserEmail']?></b></label>
            <label for="title-text" class="title-data" >Address <b class="datas" id="text-adress" ><?php  echo $data['UserAddress'] ?></b></label>
        </div>

        <div class="update" >
            Update profile here !
        </div>
        <div class="btn-all" href="Update.php">
        <button class="button-update" role="button">Update</button>
        </div>
        <div class="Logout" >
            Logout here !
        </div>
        <div class="btn-all" href="logout.php" >
        </div>
      </form>
      <button class="button-logout" role="button"  onclick="window.location.href='Logout.php'" name = "btn-logout">Logout</button>
    </div>

</body>
</html>