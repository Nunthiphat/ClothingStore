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
    $ProductName = mysqli_real_escape_string($link, $_POST['ProductName']);
    $ProductSize = mysqli_real_escape_string($link, $_POST['ProductSize']);
    $ProductPrice = mysqli_real_escape_string($link, $_POST['ProductPrice']);
    $ProductDescription = mysqli_real_escape_string($link, $_POST['ProductDescription']);
    $ProductColor = mysqli_real_escape_string($link, $_POST['ProductColor']);
    $ProductUnit = mysqli_real_escape_string($link, $_POST['ProductUnit']);
    $ProductType = mysqli_real_escape_string($link, $_POST['ProductType']);
    $ProductGender = mysqli_real_escape_string($link, $_POST['ProductGender']);

    // Handling the image upload
    $targetDirectory = "Picture/"; // Directory where you want to save the uploaded images
    $targetFile = $targetDirectory . basename($_FILES["ProductPicture"]["name"]); // Get the filename

    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES["ProductPicture"]["tmp_name"], $targetFile)) {
        echo "The file " . basename($_FILES["ProductPicture"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    // Inserting data into the database
    $sql = "INSERT INTO product (ProductID, ProductName, ProductSize, ProductPrice, ProductDescription, ProductColor, ProductUnit, ProductType, ProductGender, ProductPicture) 
            VALUES (NULL, '$ProductName', '$ProductSize', '$ProductPrice', '$ProductDescription', '$ProductColor', '$ProductUnit', '$ProductType', '$ProductGender', '$targetFile')";

    $stmt = mysqli_query($link, $sql);

    if (!$stmt) {
        echo "Error: " . mysqli_error($link);
    } else {
        header("location: crud-show.php");
        exit(); // Stop further execution after redirection
    }
}

// Closing the connection
mysqli_close($link);
?>
