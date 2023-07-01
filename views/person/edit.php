<?php
require_once('../../controllers/PersonController.php');
?>
<!DOCTYPE html>
<html>

<head>
    <?php include '../../head.html'; ?>
    <title>Edit person</title>
</head>

<body>
    <div class="container" style="padding:24px">
        <?php
        $idPerson = $_GET['id'];
        $personObject = getPerson($idPerson);

        $sendData = false;
        $personEdited = false;
        if (isset($_POST['editBtn'])) {
            $sendData = true;
        }

        if ($sendData) {
            if (isset($_POST['personName']) && isset($_POST['personSurname']) && isset($_POST['personBirthDate']) && isset($_POST['personNationality'])) {
                $personEdited = updatePerson($_POST['personId'], $_POST['personName'], $_POST['personSurname'], $_POST['personBirthDate'], $_POST['personNationality']);
            }
        }

        if (!$sendData) {
        ?>
            <div class="row">
                <div class="col-12">
                    <h1>Edit person</h1>
                </div>
            </div>
            <div class="col-12" style="padding:24px">
                <form name="create_person" action="" method="POST">
                    <input type="hidden" name="personId" value="<?php echo $idPerson; ?>" />

                    <div class="mb-3">
                        <label for="personName" class="form-label">Person name</label>
                        <input id="personName" name="personName" type="text" placeholder="Introduce the name of the new person" 
                        class="form-control" required value="<?php if (isset($personObject)) echo $personObject->getName(); ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="personSurname" class="form-label">Person surname</label>
                        <input id="personSurname" name="personSurname" type="text" placeholder="Introduce the surname of the person" 
                        class="form-control" required value="<?php if (isset($personObject)) echo $personObject->getSurname(); ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="personBirthDate" class="form-label">Person birth date</label>
                        <input id="personBirthDate" name="personBirthDate" type="text" placeholder="Introduce the birth date of the person" 
                        class="form-control" required value="<?php if (isset($personObject)) echo $personObject->getBirthdate(); ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="personNationality" class="form-label">Person nationality</label>
                        <input id="personNationality" name="personNationality" type="text" placeholder="Introduce the nationality of the person" 
                        class="form-control" required value="<?php if (isset($personObject)) echo $personObject->getNationality(); ?>" />
                    </div>
                    <input type="submit" value="Edit" class="btn btn-info" name="editBtn" />
                </form>
            </div>
    </div>
    <?php
        } else {
            if ($personEdited) {
    ?>
        <div class="row">
            <div class="alert alert-success" role="alert">
                Person edited successfully.<br><a href="list.php">Go back to the list of people.</a>
            </div>
        </div>
    <?php
            } else {
    ?>
        <div class="row">
            <div class="alert alert-danger" role="alert">
                The person has not been edited correctly.<br><a href="edit.php?id=<?php echo $idPerson; ?>">Try it again.</a>
            </div>
        </div>
<?php
            }
        } ?>
</body>

</html>