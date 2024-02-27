<?php
    $servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$tablename = "clothingstore";

	$conn = mysqli_connect($servername, $dbusername, $dbpassword, $tablename);
	if(!$conn){
		die("connection Failed:". mysqli_connect_errnor());
	}
?>