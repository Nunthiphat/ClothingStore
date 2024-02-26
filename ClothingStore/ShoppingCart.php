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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoppingCart</title>
    <!-- <link rel="stylesheet" href="shoppingcart.css"> -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header>
        <h2 class="menu-item"><a id="Logo" href="homepage.php">KHAOTOM</a></h2>
        <div class="navigation">
            <ul class="dropdown">
                <a class="dropdown-nagivation" href="">WOMEN</a>
                <ul class="dropdown-body">
                    <li><a href="homepage.php?Gender=W&Type=shirt">SHIRT</a></li>
                    <li><a href="homepage.php?Gender=W&Type=shirt">PANTS</a></li>
                    <li><a href="homepage.php?Gender=W&Type=shirt">HOODIE</a></li>
                </ul>
            </ul>
            <ul class="dropdown">
                <a class="dropdown-nagivation" href="">MEN</a>
                <ul class="dropdown-body">
                    <li><a href="homepage.php?Gender=W&Type=shirt">SHIRT</a></li>
                    <li><a href="homepage.php?Gender=W&Type=shirt">PANTS</a></li>
                    <li><a href="homepage.php?Gender=W&Type=shirt">HOODIE</a></li>
                </ul>
            </ul>
            <ul class="dropdown">
                <a class="dropdown-nagivation" href="">KIDS</a>
                <ul class="dropdown-body">
                    <li><a href="homepage.php?Gender=W&Type=shirt">SHIRT</a></li>
                    <li><a href="homepage.php?Gender=W&Type=shirt">PANTS</a></li>
                    <li><a href="homepage.php?Gender=W&Type=shirt">HOODIE</a></li>
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
    <!-- <div class="room-container">
        <?php
        $php = "SELECT * FROM Billdetail";
        $stmt = mysqli_query($conn, $php);
        $billData = mysqli_fetchAll($stmt);
        if (empty($billData)) {
            echo "<div class='row'><div class='col text-center'>Cart is empty</div></div>";
        } else {
            $count = 0;
            foreach ($billData as $bill) {
                if ($count % 3 == 0) {
                    echo "<div class='row'>";
                }
        ?>
                <div class="col-md-4 mb-3">
                    <div class="card" style="width: 400px;" onclick="return confirm('Are you sure?');">
                        <img width="400px" src="picture/<?= basename($room['RoomPicture']); ?>" class="rounded" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?= $room['RoomName']; ?></h5>
                            <p><b>Max Guest : </b><?= $room['MaxGuest']; ?></p>
                            <p><b>Type : </b><?= $room['RoomType']; ?></p>
                            <p><b>Price : </b><?= $room['RoomPrice']; ?></p>
                            <p><b>Status : </b><?= $room['RoomStatus']; ?></p>
                            <a href="roombooking.php?RoomID=<?= $room['RoomID']; ?>&CustID=<?= $CustID ?>" class="btn btn-success" onclick="return confirm('Are you sure?');">Book</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div> -->

    <form action="homepage.php">
        <button>CONTINUE SHOPPING</button>
    </form>

</body>

</html>