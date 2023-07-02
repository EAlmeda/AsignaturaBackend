<?php
    require_once('../../controllers/PlatformController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../../head.html'; ?>
        <title>Edit plataform</title>
    </head>
    <body>
        <div class="container" style="padding:24px">
            <?php
            $idPlatform = $_GET['id'];
            $platformObject = getPlatform($idPlatform);
    
            $sendData = false;
            $platformEdited = false;
            if(isset($_POST['editBtn'])) {
                $sendData = true;
            }
        
            if($sendData) {
                $nameErr = "";
                if (empty($_POST["platformName"])) {
                    $nameErr = "* Name is required";
                } else {
                    $name = parse_input($_POST["platformName"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                    $nameErr = "* Only letters and white space allowed for name";
                    }
                }

                if(isset($_POST['platformName']) && empty($nameErr)) {
                    $platformEdited = updatePlatform($_POST['platformId'], $_POST['platformName']);
                }
            }
            function parse_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if(!$sendData) {
                ?>
                <div class="row">
                    <div class="col-12">
                        <h1>Edit plataform</h1>
                    </div>
                </div>
                <div class="col-12" style="padding:24px">
                    <form name="create_platform" action="" method="POST">
                        <div class="mb-3">
                            <label for="platformName" class="form-label">Platform name</label>
                            <input id="platformName" name="platformName" type="text"
                            placeholder="Introduce the name of the new platform" class="form-control"
                            required value="<?php if(isset($platformObject)) echo $platformObject->getName(); ?>"/>
                            <input type="hidden" name="platformId" value="<?php echo $idPlatform; ?>"/>
                        </div>
                        <input type="submit" value="Edit" class="btn btn-info" name="editBtn"/>
                    </form>
                </div>
            </div>
            <?php 
        } else {
            if($platformEdited) {
                ?>
                <div class="row">
                    <div class="alert alert-success" role="alert">
                        Plataform edited successfully.<br><a href="list.php">Go back to the list of platforms.</a>
                    </div>
                </div>
                <?php 
            } else {
                ?>
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    The platform has not been edited correctly.<br><a href="edit.php?id=<?php echo $idPlatform;?>">Try it again.</a>
                </div>
            </div>
            <?php
            }
        } ?>
    </body>
</html>