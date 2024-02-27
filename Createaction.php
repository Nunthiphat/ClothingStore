<?php

include 'Connection.php';
session_start();

    $Username = $_POST['username'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Passwordconfirm = $_POST['confirmpassword'];
    $Address = $_POST['address'];

    $_SESSION['UserType'] = "Customer";
    $UserType = $_SESSION['UserType'] ;


    $Check = "SELECT * FROM useraccount WHERE UserEmail = '$Email' AND UserName = '$Username' ";
    $result = mysqli_query($conn , $Check); 
    $data = mysqli_fetch_array($result);

    if ($Password != $Passwordconfirm) {
        $_SESSION['error'] = "Password ไม่ตรงกัน";
        header("location: Create.php");
        exit ;

    } elseif ($data && $Email == $data['UserEmail']) {

        $_SESSION['error'] = "Email นี้ใช้งานไปแล้ว";
        header("location: Create.php");
        exit ;    

    } else {

        $Create = ("INSERT INTO useraccount(UserName,UserPassword,UserEmail,UserType,UserAddress) VALUE ('$Username' , '$Password' , '$Email' , '$UserType' , '$Address') ") ;
        $result2 =  mysqli_query($conn , $Create);

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
    <form action="Login.php" method="post">

    <div class="success-animation">
    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" /><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" /></svg>
    </div>

    <h1 class="">สมัครเสร็จ</h1>

    <button type="submit" class="signup-button">Login</button>

    </form>
  </div>

</body>
</html>