<?php
require_once('../../controllers/PersonController.php');
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Delete person</title>
</head>

<body>
    <div class="container">
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