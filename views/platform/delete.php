<?php
    require_once('../../controllers/PlatformController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../../head.html'; ?>
        <title>Delete plataform</title>
    </head>
    <body>
        <div class="container" style="padding:24px">
            <?php 
            $idPlatform = $_POST['platformId'];
            $platformDeleted = deletePlatform($idPlatform);

            if($platformDeleted) {
                ?>
                <div class="row">
                    <div class="alert alert-success" role="alert">
                        Plataform deleted successfully.<br><a href="list.php">Go back to the list of languages.</a>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="row">
                    <div class="alert alert-success" role="alert">
                        The platform has not been deleted correctly.<br><a href="list.php">Try it again.</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </body>
</html>