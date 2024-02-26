<?php
    session_start();
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="homepage.css"> - gus --> 
        <?php echo "<title>".$_SESSION["clothname"]."</title>";?>
    </head>
    <body>
    <header>
            <!-- logo -->
            <a href="homepage.php">Homepage</a>
            <!-- nav -->
            <nav>
                <a href="homepagephp.php?gender=w" class="women">women</a>
                <a href="homepagephp.php?gender=m" class="women">men</a>
                <a href="homepagephp.php?gender=k" class="kid">kid</a>
                <form action="homepage.php" method="GET">
                    <input type="text" name="gender">
                    <button type="submit">ok</button>
                </form>
                <a href="#">profile</a>
                <a href="#">favourite</a>
                <a href="#">Bracket</a>
            </nav>
        </header>
        <?php 
            //cloth name
            echo "<h1>".$_SESSION["clothname"]."</h1>";
            //cloth Photo
            echo "<img src='".$_SESSION["photo"]."' alt='Product Photo'>";
            //cloth price
            echo "<h2>THB ".$_SESSION["price"]."</h2>"; 
        ?>
        <form action="Clothingphp.php" method="post">
            <input type="submit" name="reset" value="Rest"><br>
            สี :
            <?php
            if(isset($_SESSION["Color"])){
                $color = $_SESSION["Color"];
                echo $color;
            }
            // <!-- ColorSelect -->
            if(isset($_SESSION["pjColor"])){
                //Dont forget to add class for css - gus
                echo "<div>";
                foreach($_SESSION["pjColor"] as $x){
                    echo "<label>";
                    echo "<input type='radio' name='SelectColor' value='".$x['ProductColor']."'>".$x['ProductColor'];
                    echo "</label>";
                }
                echo "</div>";
                echo "</div>";
            }
            ?>
            <!-- SizeSelect -->
            ขนาด :
            <?php
            if(isset($_SESSION["Size"])){
                $Size = $_SESSION["Size"];
                echo $Size;
            }
            // <!-- AmountSelect -->
            if(isset($_SESSION["pjSize"])){
                //Dont forget to add class for css - gus
                echo "<div>";
                foreach($_SESSION["pjSize"] as $x){
                    echo "<label>";
                    echo "<input type='radio' name='SelectSize' value='".$x['ProductSize']."'>".$x['ProductSize'];
                    echo "</label>";
                }
                echo "</div>";
            }
            ?>
            จำนวน :
            <?php
            // ค่าจำนวนจากการเลือกอันนี้เอาไปลบกับจำนวนตอนสั่งซื้อนะคร้าบบคุณเนท ตอนที่จายตังอะ - gus
            if(isset($_SESSION["Amount"])){
                $Amount = $_SESSION["Amount"];
                echo $Amount;
            }
            ?>
            <div>
            <select name="SelectAmount">
                <option value="1">1</option>
                <option value="1">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            </div>
            <input type="submit" name="Submit" value="ADD TO Bracket">
        </form>
    </body>
</html>