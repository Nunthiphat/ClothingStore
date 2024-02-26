<?php session_start(); 
echo $_SESSION['error'] ;
?>

<?php  
include 'Connection.php' ; 
$sql = "SELECT * FROM useraccount WHERE UserName = '$Username'"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
</head>
<body>
    <div class="Container">
        <div class="information" >
            <label for="Username"><?php ?></label>
            <input type="text">
        </div>
    </div>
</body>
</html>