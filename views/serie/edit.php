<?php
require_once('../../controllers/SerieController.php');
require_once('../../controllers/PlatformController.php');
require_once('../../controllers/ActorController.php');
require_once('../../controllers/DirectorController.php');
require_once('../../controllers/LanguageController.php');
?>
<!DOCTYPE html>
<html>

<head>
    <?php include '../../head.html'; ?>
    <link rel="stylesheet" href="./edit.css">
    <title>Edit plataform</title>
</head>

<body>
    <?php include '../../scripts.html'; ?>

    <div class="container" style="padding:24px">
        <?php
        $idSerie = $_GET['id'];
        $serie = getSerie($idSerie);

        $selectedPlatforms = [];
        $selectedActors = [];
        $selectedDirectors = [];
        $selectedAudios = [];
        $selectedCaptions = [];
        if (!isset($_POST['selectedPlatforms']))
            $_POST['selectedPlatforms'] = [];

        if (!isset($_POST['selectedActors']))
            $_POST['selectedActors'] = [];

        if (!isset($_POST['selectedDirectors']))
            $_POST['selectedDirectors'] = [];

        if (!isset($_POST['selectedAudios']))
            $_POST['selectedAudios'] = [];

        if (!isset($_POST['selectedCaptions']))
            $_POST['selectedCaptions'] = [];

        $allPlatforms = listPlatforms();
        $allDirectors = listDirectors();
        $allActors = listActors();
        $allLanguages = listLanguages();



        $sendData = false;
        $serieEdited = false;
        if (isset($_POST['editBtn'])) {
            $sendData = true;
        }

        if ($sendData) {
            if (isset($_POST['serieName'])) {
                $serieEdited = updateSerie(
                    $idSerie,
                    $_POST['serieName'],
                    $_POST['selectedPlatforms'],
                    $_POST['selectedDirectors'],
                    $_POST['selectedActors'],
                    $_POST['selectedAudios'],
                    $_POST['selectedCaptions']
                );
            }
        }

        if (!$sendData) {
        ?>
            <div class="row">
                <div class="col-12">
                    <h1>Edit serie</h1>
                </div>
            </div>
            <div class="col-12" style="padding:24px">
                <form name="create_serie" action="" method="POST">
                    <div class="mb-3">
                        <label for="serieName" class="form-label">Name</label>
                        <input id="serieName" name="serieName" type="text" placeholder="Introduce a new name for the serie" class="form-control" required value="<?php if (isset($serie)) echo $serie->getName(); ?>" />
                        <input type="hidden" name="serieId" value="<?php echo $idSerie; ?>" />
                    </div>
                    <div class="mb-3">
                        <label form="seriePlatform" class="form-label">Platforms</label>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Select platforms
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenu">
                                <?php foreach ($allPlatforms as $platform) { ?>
                                    <li>
                                        <a href="#" class="dropdown-item">
                                            <input type="checkbox" name="selectedPlatforms[]" value="<?php echo $platform->getId() ?>" <?php echo ($serie->havePlatform($platform) == true ? 'checked' : 'o'); ?>>
                                            <?php echo $platform->getName() ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label form="serieDirector" class="form-label">Directors</label>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Select directors
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenu">
                                <?php foreach (listDirectors() as $director) { ?>
                                    <li>
                                        <a href="#" class="dropdown-item">
                                            <input type="checkbox" name="selectedDirectors[]" value="<?php echo $director->getId() ?>" <?php echo ($serie->haveDirector($director) == true ? 'checked' : 'o'); ?>>
                                            <?php echo $director->getFullname() ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label form="serieActors" class="form-label">Actors</label>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Select actors
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenu">
                                <?php foreach (listActors() as $actor) { ?>
                                    <li>
                                        <a href="#" class="dropdown-item">
                                            <input type="checkbox" name="selectedActors[]" value="<?php echo $actor->getId() ?>" <?php echo ($serie->haveActor($actor) == true ? 'checked' : 'o'); ?>>
                                            <?php echo $actor->getFullname() ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label form="serieAudioLanguage" class="form-label">Audio language</label>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Select audio language
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu scrollable-menu aria-labelledby="dropdownMenu">
                                <?php foreach (listLanguages() as $audio) { ?>
                                    <li>
                                        <a href="#" class="dropdown-item">
                                            <input type="checkbox" name="selectedAudios[]" value="<?php echo $audio->getId() ?>" <?php echo ($serie->haveAudio($audio) == true ? 'checked' : 'o'); ?>>
                                            <?php echo $audio->getName() ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label form="serieCaptionLanguage" class="form-label">Caption language</label>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Select captions language
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenu">
                                <?php foreach (listLanguages() as $caption) { ?>
                                    <li>
                                        <a href="#" class="dropdown-item">
                                            <input type="checkbox" name="selectedCaptions[]" value="<?php echo $caption->getId() ?>" <?php echo ($serie->haveCaption($caption) == true ? 'checked' : 'o'); ?>>
                                            <?php echo $caption->getName() ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                    </div>


                    <div class="mb-3">
                        <input type="submit" value="Edit" class="btn btn-primary" name="editBtn" />
                    </div>
                </form>
            </div>
    </div>
    <?php
        } else {
            if ($serieEdited) {
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
                The serie has not been edited correctly.<br><a href="edit.php?id=<?php echo $idSerie; ?>">Try it again.</a>
            </div>
        </div>
<?php
            }
        } ?>
</body>

</html>