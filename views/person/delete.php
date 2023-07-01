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
        $personDeleted = deletePerson($idPerson);

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
        ?>
    </div>
</body>

</html>