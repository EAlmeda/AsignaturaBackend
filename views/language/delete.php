<?php
    require_once('../../controllers/LanguageController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Delete language</title>
    </head>
    <body>
        <div class="container">
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