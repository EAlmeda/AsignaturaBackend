<?php
    require_once('../../controllers/LanguageController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../../head.html'; ?>
        <title>Add idioma</title>
    </head>
    <body>
        <div class="container" style="padding:24px">
            <?php
                $sendData = false;
                $languageCreated = false;
                $errorMessage='';
                if(isset($_POST['languageName'])) {
                    $sendData = true;
                }
                if($sendData) {
                    if(isset($_POST['languageName']) && isset($_POST['languageIso'])) {
                        $languageCreated = storeLanguage($_POST['languageName'], $_POST['languageIso']);
                    }
                }

                if(!$sendData) {
            ?>
            <div class="row">
                <div class="col-12">
                    <h1>Add language</h1>
                </div>
                <div class="col-12" style="padding:24px">
                    <form name="create-language" action="" method="POST">
                        <div class="mb-3">
                            <label form="languageName" class="form-label">Language name</label>
                            <input id="languageName" name="languageName" type="text" placeholder="Introduce the name of the new language" class="form-control" required/>
                        </div>
                        <div class="mb-3">
                            <label form="languageIso" class="form-label">Language iso</label>
                            <input id="languageIso" name="languageIso" type="text" placeholder="Introduce the ISO code of the new language" class="form-control" required/>
                        </div>
                        <input type="submit" value="Add" class="btn btn-info" name="createBtn"/>
                    </form>
                </div>
            </div>
            <?php 
                } else {
                    if($languageCreated) {
                        ?>
                    <div class="row">
                        <div class="alert alert-success" role="alert">
                            Language created successfully.<br><a href="list.php">Go back to the list of languages.</a>
                        </div>
                    </div>
                    <?php
                    } else {
                        ?>
                    <div class="row">
                        <div class="alert alert-danger" role="alert">
                            The language has not been created correctly.<br><a href="create.php">Try it again.</a>
                        </div>
                    </div>
                    <?php
                    }
                }
                ?>
        </div>
    </body> 
</html>