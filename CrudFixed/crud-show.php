<!DOCTYPE html>
<html lang="en">
<head>
    <title>เพิ่มสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
        session_start();
        $link = mysqli_connect("localhost","root","","clothingstore");
        $sql = ("SELECT * FROM product ORDER BY ProductID DESC");
        $result = mysqli_query($link,$sql);

        if (isset($_GET['delete'])) {
            $delete_ID = $_GET['delete'];
            $deletestmt = mysqli_query($link, "DELETE FROM product WHERE ProductID = $delete_ID");
    
            if ($deletestmt) {
                echo "<script>alert('Deleted');</script>";
                $_SESSION['session'] = "Deleted";
                header("refresh:1; url=crud-show.php");
            }
        }
    ?>
    <h1>สินค้าทั้งหมด</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-end ">
                    <button type="button" class="btn btn-primary" onclick="javascript:window.location='crud.php';">เพิ่มสินค้า</button>
                </div>
            </div>
        </div>
       
               
    <table class="table">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Size</th>
            <th scope="col">Color</th>
            <th scope="col">Type</th>
            <th scope="col">Gender</th>
            <th scope="col">Unit</th>
            <th scope="col">Price</th>
            <th scope="col">Picture</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            $row = mysqli_query($link,"SELECT * FROM product ORDER BY ProductID DESC"); 
            ?>
            <?php foreach($row as $row): ?>
                <tr>
                    <td><?php echo $row["ProductID"]; ?></td>
                    <td><?php echo $row["ProductName"]; ?></td>
                    <td><?php echo $row["ProductDescription"]; ?></td>
                    <td><?php echo $row["ProductSize"]; ?></td>
                    <td><?php echo $row["ProductColor"]; ?></td>
                    <td><?php echo $row["ProductType"]; ?></td>
                    <td><?php echo $row["ProductGender"]; ?></td>
                    <td><?php echo $row["ProductUnit"]; ?></td>
                    <td><?php echo $row["ProductPrice"]; ?></td>
                    <td><img src="<?php echo $row["ProductPicture"]; ?>" width="100" title="<?php echo $row['ProductPicture']; ?>"></td>
                    <td>
                       <a href="?delete=<?= $row['ProductID']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
            </tr>
        </tbody>    
      <?php endforeach; ?>
    </table>
    <br>
    
</body>
</html>