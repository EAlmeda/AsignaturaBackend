<?php
    require_once('../../controllers/LanguageController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../../head.html'; ?>
        <title>Delete language</title>
    </head>
    <body>
        <div class="container" style="padding:24px">
            <?php 
            $idLanguage = $_POST['languageId'];
            $languageDeleted = deleteLanguage($idLanguage);

            if($languageDeleted) {
                ?>
                <div class="row">
                    <div class="alert alert-success" role="alert">
                        Language deleted successfully.<br><a href="list.php">Go back to the list of languages.</a>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="row">
                    <div class="alert alert-warning" role="alert">
                        The language has not been deleted correctly.<br><a href="list.php">Try it again.</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </body>
</html>