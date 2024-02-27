<?php
session_start();
include("dtb.php");

function getbill($conn, $userID){
    $sql = "SELECT * FROM bill WHERE UserID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:homepage.php?error=StmtFaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $userID);                                                      
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $Arrays = array();
    while($row = mysqli_fetch_assoc($resultData)){
        array_push($Arrays, $row);
    }
    $_SESSION["bill"] = $Arrays;
    mysqli_stmt_close($stmt);
}

function getbilldetail($conn, $BID){
    $sql = "SELECT * FROM billdetail WHERE BID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:homepage.php?error=StmtFaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $BID);                                                      
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $Arrays = array();
    while($row = mysqli_fetch_assoc($resultData)){
        array_push($Arrays, $row);
    }
    $_SESSION["billdetail"] = $Arrays;
    mysqli_stmt_close($stmt);
}

function getproductID($conn, $productID){
    $sql = "SELECT * FROM product WHERE ProductID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:homepage.php?error=StmtFaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $productID);                                                      
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $Arrays = array();
    while($row = mysqli_fetch_assoc($resultData)){
        array_push($Arrays, $row);
    }
    $_SESSION["productID"] = $Arrays;
    mysqli_stmt_close($stmt);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Homepage</title>
    </head>
    <body>
        <header>
            <?php include('C:\xampp\htdocs\Database\akira_project\header.php'); ?>
        </header>

    <div>
        <h1>Shopping Cart</h1>
    </div>
    <div class="parent">
        <div class="div1">
            <?php
            if (isset($_SESSION['UserID'])) {
                $userID = $_SESSION['UserID'];
                // Get billID from
                getbill($conn, $userID);
                $BID = $_SESSION["bill"];
                // Get billDetail
                getbilldetail($conn, $BID);
            } else {

                $_SESSION['error'] = "Something Wrong ?";
                header("location: homepage.php");
            }
            ?>
            <table>
                <?php

                if (!isset( $_SESSION["billdetail"])) {
                    echo "<tr><td colspan='10' class='text-center'>Cart is empty</td></tr>";
                } else {
                    // get Product ID
                    $billdetail = $_SESSION["billdetail"];
                    foreach($billdetail as $x){
                        getproductID($conn, $x["ProductID"]);
                        $productID = $_SESSION["productID"];
                        foreach ($productID as $pdData) {
                            echo'<td width="250px"><img width="100%" src="'.$pdData['ProductPicture'].'" class="rounded" alt=""></td>';
                            echo "<td>".$pdData['ProductName']."</td>";
                            echo "<td>".$pdData['ProductColor']."</td>";
                            echo "<td>".$pdData['ProductPrice']."</td>";
                            echo "<td>".$pdData['ProductSize']."</td>";
                            echo "<td>".$x['ProductBillUnit']."</td>";
                        }
                    }
                }
                ?>
            </table>
        </div>
        <div class="div2">
            <?php
            $php2 = "SELECT "
            ?>
        </div>
    </div>
    <form action="homepage.php">
        <button>CONTINUE SHOPPING</button>
    </form>

</body>

</html>