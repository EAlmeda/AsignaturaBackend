<?php
require_once('../../controllers/SerieController.php');
require_once('../../controllers/PlatformController.php');
require_once('../../controllers/DirectorController.php');
require_once('../../controllers/ActorController.php');
require_once('../../controllers/LanguageController.php');
?>
<!DOCTYPE html>
<html>

<head>
    <?php include '../../head.html'; ?>
    <link rel="stylesheet" href="./create.css">
    <title>Crear serie</title>
</head>

<body>
    <?php include '../../scripts.html'; ?>
    <div class="container" style="padding:24px">
        <?php
        $sendData = false;
        $serieCreated = false;
        $nameErr = "";

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

        if (isset($_POST['serieName'])) {
            $sendData = true;
        }
        if (empty($_POST["serieName"])) {
            $nameErr = "* Name is required";
        } else {
            $name = parse_input($_POST["serieName"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "* Only letters and white space allowed";
            }
        }
        if ($sendData) {
            if (isset($_POST['serieName']) && empty($nameErr)) {
                $serieCreated = storeSerie(
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
                    <h1>Add serie</h1>
                </div>
                <div class="col-12" style="padding:24px">
                    <form name="create-serie" action="" method="POST">
                        <div class="mb-3">
                            <label form="serieName" class="form-label">Serie name</label>
                            <input id="serieName" name="serieName" type="text" placeholder="Introduce el nombre de la serie" class="form-control" required />
                        </div>
                        <div class="mb-3">
                            <label form="seriePlatform" class="form-label">Serie platform</label>
                            <div class="dropdown ">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Select platforms
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenu">
                                    <?php foreach (listPlatforms() as $platform) { ?>
                                        <li class="dropdown-submenu">
                                            <a href="#" class="dropdown-item">
                                                <input type="checkbox" name="selectedPlatforms[]" value="<?php echo $platform->getId() ?>"> <?php echo $platform->getName() ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label form="serieDirector" class="form-label">Serie directors</label>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Select directors
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu scrollable-menu" role="menu" aria-labelledby="dropdownMenu">
                                    <?php foreach (listDirectors() as $director) { ?>
                                        <li>
                                            <a href="#" class="dropdown-item">
                                                <input type="checkbox" name="selectedDirectors[]" value="<?php echo $director->getId() ?>"> <?php echo $director->getFullname() ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label form="serieActors" class="form-label">Serie actors</label>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    Select actors
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenu">
                                    <?php foreach (listActors() as $actor) { ?>
                                        <li>
                                            <a href="#" class="dropdown-item">
                                                <input type="checkbox" name="selectedActors[]" value="<?php echo $actor->getId() ?>"> <?php echo $actor->getFullname() ?>
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
                                    Select audio languages
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenu">
                                    <?php foreach (listLanguages() as $audio) { ?>
                                        <li>
                                            <a href="#" class="dropdown-item">
                                                <input type="checkbox" name="selectedAudios[]" value="<?php echo $audio->getId() ?>"> <?php echo $audio->getName() ?>
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
                                    Select audio languages
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu scrollable-menu" aria-labelledby="dropdownMenu">
                                    <?php foreach (listLanguages() as $caption) { ?>
                                        <li>
                                            <a href="#" class="dropdown-item">
                                                <input type="checkbox" name="selectedCaptions[]" value="<?php echo $caption->getId() ?>"> <?php echo $caption->getName() ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <input type="submit" value="Create" class="btn btn-primary" name="createBtn" />
                    </form>
                </div>
            </div>
            <?php
        } else {
            if ($serieCreated) {
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