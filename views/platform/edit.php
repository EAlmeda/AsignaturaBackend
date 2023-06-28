<?php
    require_once('../../controllers/PlatformController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Edit plataform</title>
    </head>
    <body>
        <div class="container">
            <?php
            $idPlatform = $_GET['id'];
            $platformObject = getPlatform($idPlatform);
    
            $sendData = false;
            $platformEdited = false;
            if(isset($_POST['editBtn'])) {
                $sendData = true;
            }
        
            if($sendData) {
                if(isset($_POST['platformName'])) {
                    $platformEdited = updatePlatform($_POST['platformId'], $_POST['platformName']);
                }
            }

            if(!$sendData) {
                ?>
                <div class="row">
                    <div class="col-12">
                        <h1>Edit plataform</h1>
                    </div>
                </div>
                <div class="col-12">
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