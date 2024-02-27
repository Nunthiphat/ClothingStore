<?php 
    if(isset($_GET['id'])) {
       
        $link = mysqli_connect("localhost", "root", "", "clothingstore");
        $id = mysqli_real_escape_string($link, $_GET['id']);
        $sql = "DELETE FROM product WHERE ProductID = '$id'";
        $result = mysqli_query($link, $sql);

        if($result) {
            header("Location: crud-show.php?msg=Record deleted successfully");
            exit(); 
        } else {
            echo "Failed: " . mysqli_error($link);
        }

        mysqli_close($link);
    } else {
        echo "ProductID is not set";
    }



?>