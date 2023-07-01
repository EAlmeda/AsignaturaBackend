<?php
require_once('../../controllers/SerieController.php');
require_once('../../controllers/PlatformController.php');
?>
<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>List of series</title>

</head>

<body>
    <div class="container" style="padding:24px">
        <div class="row">
            <h1>List of series</h1>
            <div class="col-6" style="padding: 8px">
                <a class="btn btn-info" href="create.php">+ Add serie</a>
            </div>
            <div class="col-25">
                <?php
                $serieList = listSeries();
                if (count($serieList) > 0) {
                ?>
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th colspan="4">Title</th>
                            <th colspan="4">Plataform</th>
                            <th colspan="4">Director</th>
                            <th colspan="4">Actors</th>
                            <th colspan="4">Audio language</th>
                            <th colspan="4">Caption language</th>
                            <th colspan="4">Actions</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($serieList as $serie) {
                            ?>
                                <tr>
                                    <td><?php echo $serie->getId(); ?></td>
                                    <td colspan="4"><?php echo $serie->getName(); ?></td>
                                    <td colspan="4"><?php $result = "";
                                                    foreach ($serie->getPlatforms() as $platform) {
                                                        $result .= $platform->getName() . "- ";
                                                    }
                                                    $result = rtrim($result, "- ");
                                                    echo $result;
                                                    ?></td>
                                    <td colspan="4"><?php $result = "";
                                                    foreach ($serie->getDirectors() as $director) {
                                                        $result .= $director->getFullname() . "- ";
                                                    }
                                                    $result = rtrim($result, "- ");
                                                    echo $result;
                                                    ?></td>
                                    <td colspan="4"><?php $result = "";
                                                    foreach ($serie->getActors() as $actor) {
                                                        $result .= $actor->getFullname() . "- ";
                                                    }
                                                    $result = rtrim($result, "- ");
                                                    echo $result;
                                                    ?></td>
                                    <td colspan="4"><?php $result = "";
                                                    foreach ($serie->getAudioLanguage() as $audio) {
                                                        $result .= $audio->getName() . "- ";
                                                    }
                                                    $result = rtrim($result, "- ");
                                                    echo $result;
                                                    ?></td>
                                    <td colspan="4"><?php $result = "";
                                                    foreach ($serie->getCaptionLanguage() as $caption) {
                                                        $result .= $caption->getName() . "- ";
                                                    }
                                                    $result = rtrim($result, "- ");
                                                    echo $result;
                                                    ?></td>
                                    <td colspan="4">
                                        <div class="btn-group" role="group" aria-label="Serie">
                                            <a class="btn btn-success" href="edit.php?id=<?php echo $serie->getId(); ?>">Edit</a>

                                            <form name="delete_serie" action="delete.php" method="POST" style="display: inline; margin-left: 10px">
                                                <input type="hidden" name="serieId" value="<?php echo $serie->getId(); ?>" />
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                <?php
                } else {
                ?>
                    <div class="alert alert-warning" role="alert">
                        No series are yet available.
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>