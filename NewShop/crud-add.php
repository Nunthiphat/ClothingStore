<?php
    $link = mysqli_connect("localhost", "root", "", "clothingstore");

    if (mysqli_connect_error()) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ProductName = $_POST['ProductName'];
        $ProductSize = $_POST['ProductSize'];
        $ProductPrice = $_POST['ProductPrice'];
        $ProductDescription = $_POST['ProductDescription'];
        $ProductColor = $_POST['ProductColor'];
        $ProductUnit = $_POST['ProductUnit'];
        $ProductType = $_POST['ProductType'];
        $ProductGender = $_POST['ProductGender'];
        
        $targetDirectory = "picture/";
        $targetFile = $targetDirectory . basename($_FILES["ProductPicture"]["name"]);
        
        if (move_uploaded_file($_FILES["ProductPicture"]["tmp_name"], $targetFile)) {
             "The file ". basename($_FILES["ProductPicture"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        
        $sql = "INSERT INTO product (ProductName, ProductSize, ProductPrice, ProductDescription, ProductColor, ProductUnit, ProductType, ProductGender, ProductPicture) 
                VALUES ('$ProductName', '$ProductSize', '$ProductPrice', '$ProductDescription', '$ProductColor', '$ProductUnit', '$ProductType', '$ProductGender', '$targetFile')";
        
        if (mysqli_query($link, $sql)) {
            echo "LOADING...";
            echo"<head><meta http-equiv='Refresh'content = '1; URL = crud-show.php'></head>";
        } else {
             "Error: " . $sql . "<br>" . mysqli_error($link);
        }
    }

    mysqli_close($link);
?>
    