<?php
	session_start();

	function ViewCloth1($conn, $gender){
        $sql = "SELECT DISTINCT ProductName FROM product WHERE ProductGender = ?";
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
		
		header("location:homepage.php?$gender");
		exit();
	}

	function ViewCloth2($conn, $gender, $type){
        $sql = "SELECT DISTINCT ProductName FROM product WHERE ProductGender = ? AND ProductType = ?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location:homepage.php?error=StmtFaild");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $gender, $type);                                                      
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $Arrays = array();
		while($row = mysqli_fetch_assoc($resultData)){
			array_push($Arrays, $row);
		}
		session_start();
		$_SESSION["fn"] = $Arrays;
		mysqli_stmt_close($stmt);
		
		header("location:homepage.php?$gender&$type");
		exit();
	}	

	//get gender get suit
	if(isset($_GET["Gender"])){
		
		$gender = $_GET["Gender"];

		require_once 'dtb.php';

		if(isset($_GET["Type"])){

			$type = $_GET["Type"];

			if(isset($_SESSION["Gender"]) && isset($_SESSION["Type"])){
				// SESSION GENDER อยู่นี้นะครับบบบบบบ
				$_SESSION["gender"] = $gender;
				$_SESSION["Type"] = $type;
			}
			else{
				$_SESSION["gender"] = $gender;
				$_SESSION["Type"] = $type;
			}
			ViewCloth2($conn, $gender, $type);
		} else {
			if(isset($_SESSION["gender"])){
				// SESSION GENDER อยู่นี้นะครับบบบบบบ
				$_SESSION["gender"] = $gender;
			}
			else{
				$_SESSION["gender"] = $gender;	
			}
			ViewCloth1($conn, $gender);
		}
	}
	else {
		header("location:homepage.php?eror");
		exit();
	}
?>