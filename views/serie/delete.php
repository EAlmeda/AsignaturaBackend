<?php
    require_once('../../controllers/SerieController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Delete language</title>
    </head>
    <body>
        <div class="container" style="padding:24px">
            <?php 
            $idSerie = $_POST['serieId'];
            $serieDeleted = deleteSerie($idSerie);

            if($serieDeleted) {
                ?>
                <div class="row">
                    <div class="alert alert-success" role="alert">
                        Serie deleted successfully.<br><a href="list.php">Go back to the list of series.</a>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="row">
                    <div class="alert alert-warning" role="alert">
                        The serie has not been deleted correctly.<br><a href="list.php">Try it again.</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </body>
</html>