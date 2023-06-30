<?php
require_once('../../controllers/PersonController.php');
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Add person</title>
</head>

<body>
    <div class="container" style="padding:24px">
        <?php
        $sendData = false;
        $personCreated = false;
        $errorMessage = '';
        if (
            isset($_POST['personName'])
            && isset($_POST['personSurname'])
            && isset($_POST['personBirthdate'])
            && isset($_POST['personNationality'])
        ) {
            $personCreated = storePerson($_POST['personName'], $_POST['personSurname'],$_POST['personBirthdate'], $_POST['personNationality'],);
        }

        if (!$sendData) {
        ?>
            <div class="row">
                <div class="col-12">
                    <h1>Add person</h1>
                </div>
                <div class="col-12" style="padding:24px">
                    <form name="create-person" action="" method="POST">
                        <div class="mb-3">
                            <label form="personName" class="form-label">Name</label>
                            <input id="personName" name="personName" type="text" placeholder="Introduce the name of the new person" class="form-control" required />
                        </div>

                        <div class="mb-3">
                            <label form="personSurname" class="form-label">Surname</label>
                            <input id="personSurname" name="personSurname" type="text" placeholder="Introduce the surname of the new person" class="form-control" required />
                        </div>

                        <div class="mb-3">
                            <label form="personBirthdate" class="form-label">Birthdate</label>
                            <input id="personBirthdate" name="personBirthdate" type="date" placeholder="Introduce the birthdate of the new person" class="form-control" required />
                        </div>

                        <div class="mb-3">
                            <label form="personNationality" class="form-label">Nationality</label>
                            <input id="personNationality" name="personNationality" type="text" placeholder="Introduce the naitonality of the new person" class="form-control" required />
                        </div>

                        <input type="submit" value="Add" class="btn btn-info" name="createBtn" />
                    </form>
                </div>
            </div>
            <?php
        } else {
            if ($personCreated) {
            ?>
                <div class="row">
                    <div class="alert alert-success" role="alert">
                        Person created successfully.<br><a href="list.php">Go back to the list of people.</a>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="row">
                    <div class="alert alert-danger" role="alert">
                        The Person has not been created correctly.<br><a href="create.php">Try it again.</a>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>