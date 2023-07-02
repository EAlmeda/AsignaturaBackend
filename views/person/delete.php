<?php
require_once('../../controllers/PersonController.php');
?>
<!DOCTYPE html>
<html>

<head>
    <?php include '../../head.html'; ?>
    <title>Delete person</title>
</head>

<body>
    <div class="container" style="padding:24px">
        <?php
        $idPerson = $_POST['personId'];
        if (empty($idPerson)) {
            $idErr = "* Id is required";
          } else {
            $id = parse_input($idPerson);
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
            $personDeleted = deletePerson($id);

            if ($personDeleted) {
                ?>
                    <div class="row">
                        <div class="alert alert-success" role="alert">
                            Person deleted successfully.<br><a href="list.php">Go back to the list of people.</a>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="row">
                        <div class="alert alert-warning" role="alert">
                            The person has not been deleted correctly.<br><a href="list.php">Try it again.</a>
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