<?php 
    $ProductID = $_POST['ProductID'] = NULL; 
    $ProductName = $_POST['ProductName'];
    $ProductSize = $_POST['ProductSize'];
    $ProductPrice = $_POST['ProductPrice'];
    $ProductDescription = $_POST['ProductDescription'];
    $ProductColor = $_POST['ProductColor'];
    $ProductUnit = $_POST['ProductUnit'];
    $ProductType = $_POST['ProductType'];
    $ProductGender = $_POST['ProductGender'];
    $ProductPicture = $_FILES['ProductPicture'];

    $link = mysqli_connect("localhost","root","","clothingstore");

    $allow = array('jpg','jpeg','png');
    $extension = explode(".",$ProductPrice['name']);
    $fileAcExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileAcExt;
    $filePath = "uploads/".$fileNew;

    if(in_array($fileAcExt,$allow)){
        if ($ProductPicture['size']>0 && $ProductPicture['error']==0){
            if (move_uploaded_file($ProductPicture['tmp_name'], $filePath)){
                $sql = $conn->prepare("INSERT INTO product(NULL, ProductName, ProductSize, ProductPrice, ProductDescription, ProductColor, ProductUnit, ProductType, ProductGender, ProductPicture) VALUES
                (NULL, :ProductName, :ProductSize, :ProductPrice, :ProductDescription, :ProductColor, :ProductUnit, :ProductType, :ProductGender, :ProductPicture)");
                $sql->bindParam(":ProductName", $ProductName);
                $sql->bindParam(":ProductSize", $ProductSize);
                $sql->bindParam(":ProductPrice", $ProductPrice);
                $sql->bindParam(":ProductDescription", $ProductDescription);
                $sql->bindParam(":ProductColor", $ProductColor);
                $sql->bindParam(":ProductUnit", $ProductUnit);
                $sql->bindParam(":ProductType", $ProductType);
                $sql->bindParam(":ProductGender", $ProductGender);
                $sql->bindParam(":ProductPicture", $fileNew);
                $sql->execute();

                if($sql){
                    $_SESSION['success'] = "Insert YES";
                    header("location: crud-show.php");
                }else{
                    $_SESSION['error'] = "Insert NO";
                    header("location: crud-show.php");
                }
            }
        }
    }

   /* if(isset($_POST['submit']))
    {
        if($_FILES['ProductPicture']['error'] === 4){
            echo "<script>alert('image dose not exit')</script>";
        }else{
            $fileName = $_FILES['ProductPicture']['name'];
            $fileName = $_FILES['ProductPicture']['name'];

        }

        /*$sql = "INSERT INTO product VALUES($ProductID,$ProductName,$ProductSize,$ProductPrice,$ProductDescription,$ProductColor,$ProductUnit,$ProductType,$ProductGender,$ProductPicture)";
        
        if(mysqli_query($sql)){
            move_uploaded_file($_FILES['$ProductPicture']['temp_name'],"picture/$ProductPicture");
            echo "<script>alert('เพิ่มสินค้าสำเร็จ')</script>";
        }else{
            echo "<script>alert('เพิ่มสินค้าไม่สำเร็จ')</script>";
        }
    }*/
?>