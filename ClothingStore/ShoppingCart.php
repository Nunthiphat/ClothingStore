<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "clothingstore";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoppingCart</title>
    <link rel="stylesheet" href="shoppingcart.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header>
        <h2 class="menu-item"><a id="Logo" href="homepage.php">KHAOTOM</a></h2>
        <div class="navigation">
            <ul class="dropdown">
                <a class="dropdown-nagivation" href="homepagephp.php?Gender=w">WOMEN</a>
                <ul class="dropdown-body">
                    <li><a href="homepagephp.php?Gender=w&Type=shirt">SHIRT</a></li>
                    <li><a href="homepagephp.php?Gender=w&Type=pants">PANTS</a></li>
                    <li><a href="homepagephp.php?Gender=w&Type=hoodie">HOODIE</a></li>
                </ul>
            </ul>
            <ul class="dropdown">
                <a class="dropdown-nagivation" href="homepagephp.php?Gender=m">MEN</a>
                <ul class="dropdown-body">
                    <li><a href="homepagephp.php?Gender=m&Type=shirt">SHIRT</a></li>
                    <li><a href="homepagephp.php?Gender=m&Type=pants">PANTS</a></li>
                    <li><a href="homepagephp.php?Gender=m&Type=hoodie">HOODIE</a></li>
                </ul>
            </ul>
            <ul class="dropdown">
                <a class="dropdown-nagivation" href="homepagephp.php?Gender=k">KIDS</a>
                <ul class="dropdown-body">
                    <li><a href="homepagephp.php?Gender=k&Type=shirt">SHIRT</a></li>
                    <li><a href="homepagephp.php?Gender=k&Type=pants">PANTS</a></li>
                    <li><a href="homepagephp.php?Gender=k&Type=hoodie">HOODIE</a></li>
                </ul>
            </ul>
        </div>
    </header>

    <div>
        <h1>Shopping Cart</h1>
    </div>
    <div class="parent">
        <div class="div1">
            <?php
            if (isset($_SESSION['UserID'])) {
                $userID = $_SESSION['UserID'];
                $sql = mysqli_query($conn, "SELECT * FROM bill WHERE UserID = $userID");
                $result = mysqli_fetch_all($sql);
                $BID = $result1['BID'];
            
                $sql2 = mysqli_query($conn, "SELECT * FROM billdetail WHERE BID = $BID");
                $result2 = mysqli_fetch_all($sql2);
                $productID = $result2['ProductID'];
            } else {
                $_SESSION['error'] = "Something Wrong ?";
                header("location: homepage.php");
            }            
            $php = "SELECT * FROM product WHERE ProductID = $productID";
            $stmt = mysqli_query($conn, $php);
            $result3 = mysqli_fetch_all($stmt);
            ?>
            <table>
                <?php
                
                if (empty($result)) {
                    echo "<tr><td colspan='10' class='text-center'>Cart is empty</td></tr>";
                } else {
                    foreach ($result3 as $pdData) {
                ?>
                        <td width="250px"><img width="100%" src="Picture/<?= basename($pdData['ProductPicture']); ?>" class="rounded" alt=""></td>
                        <td><?= $pdData['ProductName'] ?></td>
                        <td><?= $pdData['ProductColor'] ?></td>
                        <td><?= $pdData['ProductPrice'] ?></td>
                        <td><?= $pdData['ProductSize'] ?></td>
                        <td><?= $result2['ProductBillUnit'] ?></td>
                <?php
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