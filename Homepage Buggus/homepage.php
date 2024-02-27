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
        <link rel="stylesheet" href="header.css">
        <title>Homepage</title>
    </head>
    <body>
        <header>
            <?php include('C:\xampp\htdocs\Database\akira_project\header.php'); ?>
        </header>
        <!-- content -->
        <!-- advertisement -->
            <?php include('header.php'); ?> 
        <?php
        if(isset($_SESSION["fn"])){
            foreach($_SESSION["fn"] as $x) {
                echo "<a href='Clothingphp.php?clothname=".$x['ProductName']."'>".$x['ProductName']."</a><br>";
            }
        }

        ?>
    </body>
</html>