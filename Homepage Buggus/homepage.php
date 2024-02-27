<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Homepage</title>
    </head>
    <body>

    <?php include(''); ?>
        <header>
            <?php include('C:\xampp\htdocs\Database\akira_project\header.php'); ?>
        </header>
        <!-- content -->
        <!-- advertisement -->
        <?php
        if(!isset($_SESSION["fn"])){
            echo "<div class='row'><div class='col text-center'>Room is empty</div></div>";
        } else {
            $count = 0;
            foreach($_SESSION["fn"] as $x) {
                if ($count % 3 == 0) {
                    echo "<div class='row'>";
                }
        ?>
        <div class="col-md-4 mb-3">
                            <div class="card" style="width: 400px;">
                                <img width="400px" src="<?= $x['ProductPicture'] ?>" class="rounded" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $x['ProductName'] ?></h5>
                                    <h5 class="card-title"><?= $x['ProductColor'] ?></h5>
                                    <a href='Clothingphp.php?clothname=<?= $x["ProductName"]?>&color=<?= $x["ProductColor"]?>&size=<?= $x["ProductSize"]?>'>Buy</a><br>
                                </div>
                            </div>
        </div>
        <?php
            $count++;
                if ($count % 3 == 0) {
                    echo "</div>";
                    }
                }
                if ($count % 3 != 0) {
                    echo "</div>";
                }
            }
        ?>
    </body>
</html>