<?php
include ('Connection.php');
session_start();


$_SESSION['email'] = $_POST['email'];
$Email = $_SESSION['email'];

$_SESSION['password'] = $_POST['password'];
$Password = $_SESSION['password'];


$Check = "SELECT * FROM useraccount WHERE UserEmail = '$Email' AND UserPassword = '$Password' ";
$result = mysqli_query($conn , $Check);


if (mysqli_num_rows($result) > 0){
    $data = mysqli_fetch_array($result);
    
    // ดึงตัวนี้ไปนะถ้าใช้ดึง UserID
    $_SESSION['UserID'] = $data['UserID'];

}else{
  
    $_SESSION['Loginerror'] = "Email หรือ Password ไม่ถูกต้อง";
    header("location: Login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Succesful</title>
    <link rel="stylesheet" href="Create.css">
</head>
<body>

  <div class="container">

    <!-- อย่าลืมเปลี่ยน action -->
    <form action="Login.php" method="post">

    <div class="success-animation">
    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" /><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" /></svg>
    </div>

    <h1 class="">ยินดีรับ</h1>

    <button type="submit" class="signup-button">Home Page</button>

    </form>
  </div>

</body>
</html>