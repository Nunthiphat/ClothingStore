<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="homepage.css">
        <title>Homepage</title>
    </head>
    <body>
    <?php include(''); ?>
        <!-- content -->
        <!-- advertisement -->
        <?php
        if(isset($_SESSION["fn"])){
            foreach($_SESSION["fn"] as $x) {
                echo "<a href='Clothingphp.php?clothname=".$x['ProductName']."'>".$x['ProductName']."</a><br>";
            }
        }
        ?>
    </body>
</html>