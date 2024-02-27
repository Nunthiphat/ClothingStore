<!DOCTYPE html>
<html lang="en">
<head>
    <title>สินค้า</title>
</head>
<body>
    <?php
        $link = mysqli_connect("localhost","root","","clothingstore");
        $sql = ("SELECT * FROM product ORDER BY ProductID DESC");
        $result = mysqli_query($link,$sql);
    ?>
    <h1>สินค้าทั้งหมด</h1>
    <table border="1" cellspacing = 0 cellpadding = 10>
        <tr>
            <td >ID</td>
            <td >Name</td>
            <td >Description</td>
            <td >Size</td>
            <td >Color</td>
            <td >Type</td>
            <td >Gender</td>
            <td >Unit</td>
            <td >Price</td>
            <td >Picture</td>
        </tr>
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
                <td> <img src="picture/<?php echo $row["ProductPicture"]; ?>" width = 200 title="<?php echo $row['ProductPicture']; ?>"> </td>
          </tr>
      <?php endforeach; ?>
    </table>
    <br>
    <a href="crud.php">เพิ่มสินค้า</a>


    
</body>
</html>