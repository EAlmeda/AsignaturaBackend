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
            if (empty($idPlatform)) {
                $idErr = "* Id is required";
              } else {
                $id = parse_input($idPlatform);
                // check if name only contains numbers
                if (!preg_match("/^[0-9]*$/",$id)) {
                  $idErr = "* Only numbers allowed";
                }
            }

            function parse_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
    
            if (empty($idErr)) {
                $platformDeleted = deletePlatform($id);

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
            } else {
                ?>
                <div class="row">
                    <div class="alert alert-warning" role="alert">
                        Please insert a valid ID, remember only numbers are allowed.<br><a href="list.php">Try it again.</a>
                    </div>
                </div>
                <?php 
            }
            ?>
        </div>
    </body>
</html>