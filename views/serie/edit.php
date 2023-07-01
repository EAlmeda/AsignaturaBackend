<?php
    require_once('../../controllers/SerieController.php');
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
            $idSerie = $_GET['id'];
            // $serieObject = getSerie($idSerie);
            $serie = getMockSerie();
    
            $sendData = false;
            $serieEdited = false;
            if(isset($_POST['editBtn'])) {
                $sendData = true;
            }
        
            if($sendData) {
                if(isset($_POST['serieName'])) {
                    // $serieEdited = updateSerie($idSerie, $_POST['serieName'], $_POST['seriePlatforms'], $_POST['serieDirects'], $_POST['serieActors'], $_POST['serieAudios'],$_POST['serieCaptions']);
                }
            }

            if(!$sendData) {
                ?>
                <div class="row">
                    <div class="col-12">
                        <h1>Edit serie</h1>
                    </div>
                </div>
                <div class="col-12" style="padding:24px">
                    <form name="create_serie" action="" method="POST">
                        <div class="mb-3">
                            <label for="serieName" class="form-label">Serie name</label>
                            <input id="serieName" name="serieName" type="text"
                            placeholder="Introduce a new name for the serie" class="form-control"
                            required value="<?php if(isset($serie)) echo $serie->getName(); ?>"/>
                            <input type="hidden" name="serieId" value="<?php echo $idSerie; ?>"/>
                        </div>
                        <div class="mb-3">
                            <label form="seriePlatform" class="form-label">Serie platform</label>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Select platforms
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                    <?php foreach ($serie->getPlatforms() as $platform) { ?>
                                        <li>
                                            <a href="#" class="dropdown-item">
                                                <input type="checkbox" name="director" value="<?php echo $platform->getId() ?>"> <?php echo $platform->getName() ?>
                                            </a>
                                        </li>
                                        <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label form="serieDirector" class="form-label">Serie directors</label>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Select directors
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                    <?php foreach ($serie->getDirectors() as $director) { ?>
                                    <li>
                                        <a href="#" class="dropdown-item">
                                            <input type="checkbox" name="director" value="<?php echo $director->getId() ?>"> <?php echo $director->getFullname() ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- <input id="serieDirector" name="serieDirector" type="text" placeholder="Introduce el nombre de la serie" class="form-control" required/> -->
                        </div>
                        <div class="mb-3">
                            <label form="serieActors" class="form-label">Serie actors</label>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Select actors
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                    <?php foreach ($serie->getActors() as $actor) { ?>
                                    <li>
                                        <a href="#" class="dropdown-item">
                                            <input type="checkbox" name="actor" value="<?php echo $actor->getId() ?>"> <?php echo $actor->getFullname() ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- <input id="serieActors" name="serieDirector" type="text" placeholder="Introduce el nombre de la serie" class="form-control" required/> -->
                        </div>
                        <div class="mb-3">
                            <label form="serieAudioLanguage" class="form-label">Audio language</label>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Select audio languages
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                    <?php foreach ($serie->getAudioLanguage() as $audio) { ?>
                                    <li>
                                        <a href="#" class="dropdown-item">
                                            <input type="checkbox" name="audio" value="<?php echo $audio->getId() ?>"> <?php echo $audio->getName() ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- <input id="serieAudioLanguage" name="serieAudioLanguage" type="text" placeholder="Introduce el idioma del audio" class="form-control"/> -->
                        </div>
                        <div class="mb-3">
                        
                        <input type="submit" value="Edit" class="btn btn-info" name="editBtn"/>
                    </form>
                </div>
            </div>
            <?php 
        } else {
            if($serieEdited) {
                ?>
                <div class="row">
                    <div class="alert alert-success" role="alert">
                        Serie edited successfully.<br><a href="list.php">Go back to the list of series.</a>
                    </div>
                </div>
                <?php 
            } else {
                ?>
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    The serie has not been edited correctly.<br><a href="edit.php?id=<?php echo $idSerie;?>">Try it again.</a>
                </div>
            </div>
            <?php
            }
        } ?>
    </body>
</html>