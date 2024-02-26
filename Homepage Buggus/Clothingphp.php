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

//for submit to bey (addd to baracket)
if (isset($_POST["Submit"])) {

    if (isset($_POST["SelectColor"]) && isset($_POST["SelectSize"]) && isset($_POST["SelectAmount"])) {
        $Color = $_POST["SelectColor"];
        $Size = $_POST["SelectSize"];
        $Amount = $_POST["SelectAmount"];

        // SESSION เอาไว้ใช้กับตระกร้าอยู่ตรงนี้นะเนทคร้าบบบบ
        // SESSION GENDER กำหนดเรียกได้เลยจาก $_SESSION["gender"]; คร้าบบบบบ
        $_SESSION["Color"] = $Color;
        $_SESSION["Size"] = $Size;
        $_SESSION["Amount"] = $Amount;

        header("location: Clothing.php?Success");
        exit();
    } else {
        header("location: Clothing.php?EmptyData");
        exit();
    }
// for chang page to this page function shuld be run here 
} elseif (isset($_GET["clothname"])) {

    $clothname = $_GET["clothname"];
    $price = $_GET["price"];
    $photo = $_GET["photo"];

    $_SESSION["clothname"] = $clothname;
    $_SESSION["price"] = $price;
    $_SESSION["photo"] = $photo;

    selectcolor($conn, $clothname);
    selectsize($conn, $clothname);

    header("location: Clothing.php?success");
    exit();
// delet when not use - gus
} elseif (isset($_POST["reset"])){
    session_destroy();
    header("location: Clothing.php?reset");
    exit();

} else {
    header("location: Clothing.php?error");
    exit();
}
?>
