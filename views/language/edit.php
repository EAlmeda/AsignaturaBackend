<?php
require_once('../../controllers/LanguageController.php');
?>
<!DOCTYPE html>
<html>

<head>
    <?php include '../../head.html'; ?>
    <title>Edit language</title>
</head>

<body>
    <div class="container" style="padding:24px">
        <?php
        $idLanguage = $_GET['id'];
        $idErr = '';
        if (empty($idLanguage)) {
            $idErr = "* Name is required";
        } else {
            $id = parse_input($idLanguage);
            // check if name only contains numbers
            if (!preg_match("/^[0-9]*$/",$id)) {
            $idErr = "* Only numbers allowed";
            }
        }

        $sendData = false;
        if (empty($idErr)) {
            $languageObject = getLanguageData($idLanguage);

            $languageEdited = false;
            if (isset($_POST['editBtn'])) {
                $sendData = true;
            }

            if ($sendData) {
                $nameErr = $isoErr = "";
                if (empty($_POST["languageName"])) {
                    $nameErr = "* Name is required";
                } else {
                    $name = parse_input($_POST["languageName"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                    $nameErr = "* Only letters and white space allowed";
                    }
                }
                if (empty($_POST["languageIso"])) {
                    $isoErr = "* ISO is required";
                } else {
                    $iso = parse_input($_POST["languageIso"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]{2}$/",$iso)) {
                    $isoErr = "* Only 2 letters allowed";
                    }
                }
                if (isset($_POST['languageName']) && isset($_POST['languageIso']) && empty($nameErr) && empty($isoErr)) {
                    $languageEdited = updateLanguage($_POST['languageId'], $_POST['languageName'], $_POST['languageIso']);
                }
            }
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
                    <h1>Edit language</h1>
                </div>
            </div>
            <div class="col-12" style="padding:24px">
                <form name="create_language" action="" method="POST">
                    <input type="hidden" name="languageId" value="<?php echo $idLanguage; ?>" />

                    <div class="mb-3">
                        <label for="languageName" class="form-label">Language name</label>
                        <input id="languageName" name="languageName" type="text" placeholder="Introduce the name of the new language" 
                        class="form-control" required value="<?php if (isset($languageObject)) echo $languageObject->getName(); ?>" />
                    </div>
                    <div class="mb-3">
                        <label for="languageIso" class="form-label">Language ISO code</label>
                        <input id="languageIso" name="languageIso" type="text" placeholder="Introduce the ISO code of the new language" class="form-control" required value="<?php if (isset($languageObject)) echo $languageObject->getISOCode(); ?>" />
                    </div>
                    <input type="submit" value="Edit" class="btn btn-info" name="editBtn" />
                </form>
            </div>
    </div>
    <?php
        } else {
            if ($languageEdited) {
    ?>
        <div class="row">
            <div class="alert alert-success" role="alert">
                Language edited successfully.<br><a href="list.php">Go back to the list of languages.</a>
            </div>
        </div>
    <?php
            } else {
    ?>
        <div class="row">
            <div class="alert alert-danger" role="alert">
                The language has not been edited correctly.<br><a href="edit.php?id=<?php echo $idLanguage; ?>">Try it again.</a>
            </div>
        </div>
<?php
            }
        } ?>
</body>

</html>