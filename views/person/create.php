<?php
require_once('../../controllers/PersonController.php');
?>
<!DOCTYPE html>
<html>

<head>
<?php include '../../head.html'; ?>
    <title>Add person</title>
</head>

<body>
    <div class="container" style="padding:24px">
        <?php
        $sendData = false;
        $personCreated = false;
        $nameErr = $surnameErr = $birthdateErr = $nationalityErr = "";
        if (empty($_POST["personName"])) {
            $nameErr = "* Name is required";
          } else {
            $name = parse_input($_POST["personName"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
              $nameErr = "* Only letters and white space allowed";
            }
          }
        if (empty($_POST["personSurname"])) {
            $surnameErr = "* Surname is required";
          } else {
            $surname = parse_input($_POST["personSurname"]);
            // check if surname only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$surname)) {
              $surnameErr = "* Only letters and white space allowed";
            }
          }
        if (empty($_POST["personBirthdate"])) {
            $birthdateErr = "* BirthDate is required";
          } else {
            $birthdate = parse_input($_POST["personBirthdate"]);
            // check if birthdate follows dd/mm/YYYY format
            if (!preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/",$birthdate)) {
              $birthdateErr = "* Only dd/mm/YYYY format allowed";
            }
          }
        if (empty($_POST["personNationality"])) {
            $nationalityErr = "* Nationality is required";
          } else {
            $nationality = parse_input($_POST["personNationality"]);
            // check if nationality only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$nationality)) {
              $nationalityErr = "* Only letters and white space allowed";
            }
          }
        if (
            empty($nameErr) && empty($surnameErr) && empty($birthdateErr) && empty($nationalityErr)
        ) {
            $personCreated = storePerson($_POST['personName'], $_POST['personSurname'],$_POST['personBirthdate'], $_POST['personNationality'],);
        }
        
        function parse_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
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
                            <span class="error"> <?php echo $nameErr;?></span>
                        </div>

                        <div class="mb-3">
                            <label form="personSurname" class="form-label">Surname</label>
                            <input id="personSurname" name="personSurname" type="text" placeholder="Introduce the surname of the new person" class="form-control" required />
                            <span class="error"> <?php echo $surnameErr;?></span>
                        </div>

                        <div class="mb-3">
                            <label form="personBirthdate" class="form-label">Birthdate</label>
                            <input id="personBirthdate" name="personBirthdate" type="date" placeholder="Introduce the birthdate of the new person" class="form-control" required />
                            <span class="error"> <?php echo $birthdateErr;?></span>
                        </div>

                        <div class="mb-3">
                            <label form="personNationality" class="form-label">Nationality</label>
                            <input id="personNationality" name="personNationality" type="text" placeholder="Introduce the naitonality of the new person" class="form-control" required />
                            <span class="error"> <?php echo $nationalityErr;?></span>
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