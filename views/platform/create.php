<?php
    require_once('../../controllers/PlatformController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../../head.html'; ?>
        <title>Add plataform</title>
    </head>
    <body>
        <div class="container" style="padding:24px">
            <?php
                $sendData = false;
                $platformCreated = false;
                $nameErr = "";
                if (empty($_POST["platformName"])) {
                    $nameErr = "* Name is required";
                } else {
                    $name = parse_input($_POST["platformName"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                    $nameErr = "* Only letters and white space allowed";
                    }
                }
                if(isset($_POST['platformName'])) {
                    $sendData = true;
                }
                if($sendData && empty($nameErr)) {
                    $platformCreated = storePlatform($_POST['platformName']);
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
                    <h1>Add plataform</h1>
                </div>
                <div class="col-12" style="padding:24px">
                    <form name="create-platform" action="" method="POST">
                        <div class="mb-3">
                            <label form="platformName" class="form-label">Platform name</label>
                            <input id="platformName" name="platformName" type="text" placeholder="Introduce the name of the new platform" class="form-control" required/>
                        </div>
                        <input type="submit" value="Crear" class="btn btn-info" name="createBtn"/>
                    </form>
                </div>
            </div>
            <?php 
                } else {
                    if($platformCreated) {
                        ?>
                    <div class="row">
                        <div class="alert alert-success" role="alert">
                            Plataform created successfully.<br><a href="list.php">Go back to the list of platforms.</a>
                        </div>
                    </div>
                    <?php
                    } else {
                        ?>
                    <div class="row">
                        <div class="alert alert-danger" role="alert">
                            The platform has not been created correctly.<br><a href="create.php">Try it again.</a>
                        </div>
                    </div>
                    <?php
                    }
                }
                ?>
        </div>
    </body> 
</html>