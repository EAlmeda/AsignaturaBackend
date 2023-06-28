<?php
    require_once('../../controllers/serieController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Crear serie</title>
    </head>
    <body>
        <div class="container">
            <?php
                $sendData = false;
                $serieCreated = false;
                if(isset($_POST['serieTitle'])) {
                    $sendData = true;
                }
                if($sendData) {
                    if(isset($_POST['serieTitle'])) {
                        // $serieCreated = storeSerie($_POST['serieTitle']);
                    }
                }

                if(!$sendData) {
            ?>
            <div class="row">
                <div class="col-12">
                    <h1>Add series</h1>
                </div>
                <div class="col-12">
                    <form name="create-serie" action="" method="POST">
                        <div class="mb-3">
                            <label form="serieTitle" class="form-label">Serie name</label>
                            <input id="serieTitle" name="serieTitle" type="text" placeholder="Introduce el nombre de la serie" class="form-control" required/>
                        </div>
                        <div class="mb-3">
                            <label form="seriePlatform" class="form-label">Serie platform</label>
                            <input id="seriePlatform" name="seriePlatform" type="text" placeholder="Selecciona la plataforma" class="form-control" required/>
                        </div>
                        <div class="mb-3">
                            <label form="serieDirector" class="form-label">Serie director</label>
                            <!-- <input id="serieDirector" name="serieDirector" type="text" placeholder="Introduce el nombre de la serie" class="form-control" required/> -->
                        </div>
                        <div class="mb-3">
                            <label form="serieActors" class="form-label">Serie actors</label>
                            <!-- <input id="serieActors" name="serieDirector" type="text" placeholder="Introduce el nombre de la serie" class="form-control" required/> -->
                        </div>
                        <div class="mb-3">
                            <label form="serieAudioLanguage" class="form-label">Audio language</label>
                            <!-- <input id="serieAudioLanguage" name="serieAudioLanguage" type="text" placeholder="Introduce el idioma del audio" class="form-control"/> -->
                        </div>
                        <div class="mb-3">
                            <label form="serieCaptionLanguage" class="form-label">Caption language</label>
                            <!-- <input id="serieTitle" name="serieTitle" type="text" placeholder="Introduce el nombre de la serie" class="form-control"/> -->
                        </div>
                        <input type="submit" value="Crear" class="btn btn-info" name="createBtn"/>
                    </form>
                </div>
            </div>
            <?php 
                } else {
                    if($serieCreated) {
                        ?>
                    <div class="row">
                        <div class="alert alert-success" role="alert">
                            Serie created successfully.<br><a href="list.php">Go back to the list of platforms.</a>
                        </div>
                    </div>
                    <?php
                    } else {
                        ?>
                    <div class="row">
                        <div class="alert alert-danger" role="alert">
                            The serie has not been edited correctly. <br><a href="create.php">Try it again.</a>
                        </div>
                    </div>
                    <?php
                    }
                }
                ?>
        </div>
    </body> 
</html>