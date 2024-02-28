<?php
session_start();

require_once 'dtb.php';

function selectcolor($conn, $clothname){
    $sql = "SELECT DISTINCT ProductColor FROM `product` WHERE ProductName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:homepage.php?error=StmtFaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $clothname);                                                      
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $Arrays = array();
    while($row = mysqli_fetch_assoc($resultData)){
        array_push($Arrays, $row);
    }
    $_SESSION["pjColor"] = $Arrays;
    mysqli_stmt_close($stmt);
}

function selectsize($conn, $clothname){
    $sql = "SELECT DISTINCT ProductSize FROM `product` WHERE ProductName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:homepage.php?error=StmtFaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $clothname);                                                      
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $Arrays = array();
    while($row = mysqli_fetch_assoc($resultData)){
        array_push($Arrays, $row);
    }
    $_SESSION["pjSize"] = $Arrays;
    mysqli_stmt_close($stmt);
}

function selectprice($conn, $clothname){
    $sql = "SELECT DISTINCT ProductPrice FROM `product` WHERE ProductName = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: homepage.php?error=StmtFaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $clothname);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);
    if ($row) {
        $_SESSION["pjPrice"] = $row['ProductPrice'];
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function selectPID($conn, $ProductName, $ProductSize, $ProductPrice, $ProductColor, $Producttype, $ProductGender){
    $sql = "SELECT ProductID FROM `product` WHERE ProductName = ? AND ProductSize = ? AND ProductPrice = ? AND ProductColor = ? AND ProductType = ? AND ProductGender = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: homepage.php?error=StmtFaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssssss", $ProductName, $ProductSize, $ProductPrice, $ProductColor, $Producttype, $ProductGender);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);
    if ($row) {
        $_SESSION["pjCloth"] = $row['ProductID'];
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}
// Show BILL
function selectBID($conn, $UserID){
    $sql = "SELECT BID FROM `bill` WHERE UserID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: homepage.php?error=StmtFaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "i", $UserID);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);
    if ($row) {
        $_SESSION["BID"] = $row['BID'];
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function updatebill($conn, $TotalPrice, $UserID){
    $sql = "UPDATE `bill` SET `TotalPrice` = ? WHERE `bill`.`UserID` = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: homepage.php?error=StmtFaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "di", $TotalPrice, $UserID);
    mysqli_stmt_execute($stmt);
}

function selectphoto($conn, $clothname, $Size, $color){
    $sql = "SELECT ProductPicture FROM `product` WHERE ProductName = ? AND ProductSize = ? AND ProductColor = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: homepage.php?error=StmtFaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "sss", $clothname, $Size, $color);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($resultData);
    if ($row) {
        $_SESSION["pjPhoto"] = $row['ProductPicture'];
    } else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

// Gen BID
function addbill($conn, $TotalPrice, $UserID){
    $sql = "INSERT INTO `bill` (`BID`, `TotalPrice`, `UserID`) VALUES (NULL, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:homepage.php?error=StmtFaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "di", $TotalPrice, $UserID);                                          
    mysqli_stmt_execute($stmt);
}

function addbilltail($conn, $BID, $ProductBillUnit, $BDDate, $ProductID){
    $sql = "INSERT INTO `billdetail` (`BDID`, `BID`, `ProductBillUnit`, `BDDate`, `ProductID`) VALUES (NULL, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:homepage.php?error=StmtFaild");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "iidi", $BID, $ProductBillUnit, $BDDate, $ProductID);                                        
    mysqli_stmt_execute($stmt);
}

//for addbill to bey (addd to baracket)
if (isset($_POST["addbill"])) {
    // EXAMPLE USER ID DONT FOR GET TO REMOVE
    if(isset($_SESSION["UserID"])){
        $UserID = $_SESSION["UserID"];
    }
    if (isset($_POST["SelectColor"]) && isset($_POST["SelectSize"]) && isset($_POST["SelectAmount"])) {
        $ProductName = $_SESSION["clothname"];
        $ProductSize = $_POST["SelectSize"];
        $ProductColor = $_POST["SelectColor"];
        $ProductPrice = $_SESSION["pjPrice"];
        $ProductBillUnit = $_POST["SelectAmount"];
        $Producttype = $_SESSION["Type"];
        $ProductGender = $_SESSION["gender"];

        $TotalPrice = $ProductBillUnit * $ProductPrice;
        $_SESSION["TotalPrice"] += $TotalPrice;

        if(!isset($_SESSION["BID"])){
            addbill($conn, $_SESSION["TotalPrice"], $UserID);
            selectBID($conn, $UserID);
            $BID = $_SESSION["BID"];
        }
        else {
            // Update BILL dataBase
            updatebill($conn, $_SESSION["TotalPrice"], $UserID);
            selectBID($conn, $UserID);
            $BID = $_SESSION["BID"];
            selectPID($conn, $ProductName, $ProductSize, $ProductPrice, $ProductColor, $Producttype, $ProductGender);
            $ProductID = $_SESSION["pjCloth"];
            $BDDate = "2024-02-01"; // ลบด้วยตัวอ่างนะ
            addbilltail($conn, $BID, $ProductBillUnit, $BDDate, $ProductID);
        }

        header("location: homepage.php");
        exit();
    } else {
        header("location: Clothing.php?EmptyData");
        exit();
    }
// for show cloth
} elseif (isset($_POST["Show"])){
    $clothname = $_SESSION["clothname"];

    if(isset($_POST["SelectColor"])){
        $color = $_POST["SelectColor"];
        $_SESSION["Color"] = $color;
    } else {
        $color = $_SESSION["Color"];
    }
    if(isset($_POST["SelectSize"])){
        $size = $_POST["SelectSize"];
        $_SESSION["Size"] = $size;
    } else {
        $size = $_SESSION["Size"];
    }

    selectphoto($conn, $clothname, $size, $color);
    selectprice($conn, $clothname);
    selectcolor($conn, $clothname);
    selectsize($conn, $clothname);

    header("location: Clothing.php?color=$color&size=$size");
    exit();

// for chang page to this page function shuld be run here 
} elseif (isset($_GET["clothname"])) {
    $clothname = $_GET["clothname"];
    $size = $_GET["size"];
    $color = $_GET["color"];

    $_SESSION["clothname"] = $clothname;
    $_SESSION["Size"] = $size;
    $_SESSION["Color"] = $color;

    selectphoto($conn, $clothname, $size, $color);
    selectprice($conn, $clothname);
    selectcolor($conn, $clothname);
    selectsize($conn, $clothname);

    header("location: Clothing.php");
    exit();
} else {
    header("location: Clothing.php?error");
    exit();
}
?>
