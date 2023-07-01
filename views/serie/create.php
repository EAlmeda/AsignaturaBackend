<?php
    require_once('../../controllers/serieController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../../head.html'; ?>
        <title>Crear serie</title>
    </head>
    <body>
        <div class="container" style="padding:24px">
            <?php
                $serie = getMockSerie();
                $sendData = false;
                $serieCreated = false;
                if(isset($_POST['serieName'])) {
                    $sendData = true;
                }
                if($sendData) {
                    if(isset($_POST['serieName'])) {
                        // $serieCreated = storeSerie($_POST['serieName'], $_POST['seriePlatforms'], $_POST['serieDirects'], $_POST['serieActors'], $_POST['serieAudios'],$_POST['serieCaptions']);
                    }
                }

                if(!$sendData) {
            ?>
            <div class="row">
                <div class="col-12">
                    <h1>Add serie</h1>
                </div>
                <div class="col-12" style="padding:24px">
                    <form name="create-serie" action="" method="POST">
                        <div class="mb-3">
                            <label form="serieName" class="form-label">Serie name</label>
                            <input id="serieName" name="serieName" type="text" placeholder="Introduce el nombre de la serie" class="form-control" required/>
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
                            <label form="serieCaptionLanguage" class="form-label">Caption language</label>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Select audio languages
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                    <?php foreach ($serie->getCaptionLanguage() as $caption) { ?>
                                    <li>
                                        <a href="#" class="dropdown-item">
                                            <input type="checkbox" name="caption" value="<?php echo $caption->getId() ?>"> <?php echo $caption->getName() ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- <input id="serieTitle" name="serieTitle" type="text" placeholder="Introduce el nombre de la serie" class="form-control"/> -->
                        </div>
                        <input type="submit" value="Create" class="btn btn-info" name="createBtn"/>
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