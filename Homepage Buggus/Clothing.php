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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <?php echo "<title>".$_SESSION["clothname"]."</title>";?>
    </head>
    <body>
    <header>
        <?php include('C:\xampp\htdocs\Database\akira_project\header.php'); ?>
    </header>
    <div class ="box-main" >
        <div>
        <?php 
            //cloth name
            if(isset($_SESSION["clothname"])){
                echo "<h1>".$_SESSION["clothname"]."</h1>";
            }
            //cloth Photo
            if(isset($_SESSION["pjPhoto"])){
                echo "<img src='".$_SESSION["pjPhoto"]."' alt='Product Photo'>";
            }
            //cloth price
            if(isset($_SESSION["pjPrice"])){
                echo "<h2>THB ".$_SESSION["pjPrice"]."</h2>";
            }
        ?>
        </div>
        <form action="Clothingphp.php" method="post">
            <!-- <input type="submit" name="reset" value="Rest"><br> -->
            สี :
            <?php
            if(isset($_SESSION["Color"])){
                $color = $_SESSION["Color"];
                echo $color;
            }
            // <!-- ColorSelect -->
            if(isset($_SESSION["pjColor"])){
                //Dont forget to add class for css
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
                //Dont forget to add class for css
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
            // ค่าจำนวนจากการเลือกอันนี้เอาไปลบกับจำนวนตอนสั่งซื้อนะคร้าบบคุณเนท ตอนที่จายตังอะ
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
            <input type="submit" name="Show" value="Show">
            <input type="submit" name="addbill" value="ADD TO Bracket">
        </div>
        </form>
    </body>
</html>