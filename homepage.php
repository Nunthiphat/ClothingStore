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

        <!-- content -->
        <!-- advertisement -->
        <?php
        if(isset($_SESSION["fn"])){
            foreach($_SESSION["fn"] as $x) {
                echo "<a href='Clothingphp.php?clothname=".$x['ProductName']."&price=".$x['ProductPrice']."&photo=".$x['ProductPicture']."'>".$x['ProductName']."</a><br>";
            }
        }
        ?>
    </body>
</html>