<?php
	session_start();

	function ViewCloth1($conn, $gender){
        $sql = "SELECT * FROM product WHERE ProductGender = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location:homepage.php?error=StmtFaild");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $gender);                                                      
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $Arrays = array();
		while($row = mysqli_fetch_assoc($resultData)){
			array_push($Arrays, $row);
		}
		session_start();
		$_SESSION["fn"] = $Arrays;
		mysqli_stmt_close($stmt);
		
		header("location:homepage.php?");
		exit();
	}	

	//get gender get suit
	if(isset($_GET["gender"])){
		$gender = $_GET["gender"];

		require_once 'dtb.php';

		if(isset($_SESSION["gender"])){
			// SESSION GENDER อยู่นี้นะครับบบบบบบ
			$_SESSION["gender"] = $gender;
		}
		else{
			$_SESSION["gender"] = $gender;	
		}
		ViewCloth1($conn, $gender);
	}
	else {
		header("location:homepage.php?eror");
		exit();
	}
?>