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
                $errorMessage='';
                if(isset($_POST['platformName'])) {
                    $sendData = true;
                }
                if($sendData) {
                    if(isset($_POST['platformName'])) {
                        $platformCreated = storePlatform($_POST['platformName']);
                    }
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