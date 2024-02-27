<?php
    // Establishing a connection to the database
    $link = mysqli_connect("localhost", "root", "", "clothingstore");

    // Check the connection
    if (mysqli_connect_error()) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Handling the form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Assigning POST data to variables
        $ProductName = $_POST['ProductName'];
        $ProductSize = $_POST['ProductSize'];
        $ProductPrice = $_POST['ProductPrice'];
        $ProductDescription = $_POST['ProductDescription'];
        $ProductColor = $_POST['ProductColor'];
        $ProductUnit = $_POST['ProductUnit'];
        $ProductType = $_POST['ProductType'];
        $ProductGender = $_POST['ProductGender'];
        
        // Handling the image upload
        $targetDirectory = "picture/"; // Directory where you want to save the uploaded images
        $targetFile = $targetDirectory . basename($_FILES["ProductPicture"]["name"]); // Get the filename
        
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["ProductPicture"]["tmp_name"], $targetFile)) {
             "The file ". basename($_FILES["ProductPicture"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        
        // Inserting data into the database
        $sql = "INSERT INTO product (ProductName, ProductSize, ProductPrice, ProductDescription, ProductColor, ProductUnit, ProductType, ProductGender, ProductPicture) 
                VALUES ('$ProductName', '$ProductSize', '$ProductPrice', '$ProductDescription', '$ProductColor', '$ProductUnit', '$ProductType', '$ProductGender', '$targetFile')";
        
        if (mysqli_query($link, $sql)) {
            echo "LOADING...";
            echo"<head><meta http-equiv='Refresh'content = '1; URL = crud-show.php'></head>";
        } else {
             "Error: " . $sql . "<br>" . mysqli_error($link);
        }
    }

    // Closing the connection
    mysqli_close($link);
?>
    