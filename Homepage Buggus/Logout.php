<?php
session_start();


session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page or any other desired page
header("Location: Login.php");
exit();

?>
