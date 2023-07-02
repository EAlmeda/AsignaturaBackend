<?php
    require_once('../../controllers/SerieController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../../head.html'; ?>
        <title>Delete language</title>
    </head>
    <body>
        <div class="container" style="padding:24px">
            <?php 
            $idSerie = $_POST['serieId'];
            if (empty($idSerie)) {
                $idErr = "* Id is required";
              } else {
                $id = parse_input($idSerie);
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
                $serieDeleted = deleteSerie($id);

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
            }
            ?>
        </div>
    </body>
</html>