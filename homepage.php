<?php
    $servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$tablename = "akira_final";
	
	$conn = mysqli_connect($servername, $dbusername, $dbpassword, $tablename);
	if(!$conn){
		die("connection Failed:". mysqli_connect_errnor());
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="homepage.css">
        <title>Homepage</title>
    </head>
    <body>
        <header>
            <!-- logo -->
            <a href="homepage.php">Homepage</a>
            <!-- nav -->
            <nav>
                <a href="homepage.php?gender=w" class="women">women</a>
                <a href="homepage.php?gender=m" class="women">men</a>
                <a href="homepage.php?" class="women">kid</a>
                <form action="homepage.php" method="GET">
                    <input type="text" name="gender">
                    <button type="submit">ok</button>
                </form>
                <a href="#">profile</a>
                <a href="#">favourite</a>
                <a href="#">Bracket</a>
            </nav>
        </header>

        <!-- content -->
        <!-- advertisement -->
        <?php
            if(isset($_GET["gender"])){
                $gender = $_GET["gender"];
                echo "<h3>".$gender."</h3>";

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
                    // echo ProductIMage
                    echo $row["ProductName"]."<br>";
                }
            }
            else {
                //index
            }
        ?>
    </body>
</html>