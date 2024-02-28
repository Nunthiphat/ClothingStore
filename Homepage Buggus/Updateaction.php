<?php
session_start();

include 'Connection.php';

$Username = $_POST['Username'];
$Password = $_POST['Password'];
$ConfirmPassword = $_POST['ConfirmPassword'];
$Address = $_POST['Address'];

$Email = $_SESSION['email'];
$UserID = $_SESSION['UserID'];

$sql = "UPDATE useraccount SET UserName = '$Username', UserPassword = '$Password', UserAddress = '$Address' WHERE UserEmail = '$Email' AND UserID = '$UserID' ";
$result = mysqli_query($conn, $sql);

if ($result) {
    $_SESSION['successful'] = "Update successful";
    header("Location: Update.php");
    exit();
} else {
    $_SESSION['errorupdate'] = "Update failed";
    header("Location: Update.php");
    exit();
}
?>
