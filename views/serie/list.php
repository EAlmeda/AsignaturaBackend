<?php
    require_once('../../controllers/SerieController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>List of series</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>List of series</h1>
                <div class="col-6">
                    <a class="btn btn-info" href="create.php">+ Add serie</a>
                </div>
                <div class="col-12">
                    <?php
                    $serieList = listSeries();
                    if(count($serieList) > 0) {
                    ?>
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Platafor</th>
                            <th>Director</th>
                            <th>Actors</th>
                            <th>Audio language</th>
                            <th>Caption language</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($serieList as $serie) {
                            ?>
                            <tr>
                                <td><?php echo $serie->getId(); ?></td>
                                <td><?php echo $serie->getTitle(); ?></td>
                                <td><?php echo $serie->getPlatform(); ?></td>
                                <td><?php echo $serie->getDirector(); ?></td>
                                <td><?php foreach($serie->getActors() as $actor) { echo $actor; }?></td>
                                <td><?php echo $serie->getAudioLanguage(); ?></td>
                                <td><?php echo $serie->getCaptionLanguage(); ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Serie">
                                        <a class="btn btn-success" href="edit.php?id=<?php echo $serie->getId();?>">Edit</a>
                                        &nbsp:&nbsp;
                                        <form name="delete_serie" action="delete.php" method="POST" style="display: inline;">
                                            <input type="hidden" name="serieId" value="<?php echo $serie->getId();?>" />
                                            <button type="submit" class="btn btn-danger">Delete</button>  
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php
                        } } else {
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