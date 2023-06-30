<?php
require_once('../../controllers/PlatformController.php');
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>List of platforms</title>
</head>

<body>
    <div class="container" style="padding:24px">
        <div class="row">
            <h1>List of platforms</h1>
            <div class="col-6" style="padding: 8px">
                <a class="btn btn-info" href="create.php">+ Add plataform</a>
            </div>
            <div class="col-12" style="padding:24px">
                <?php
                $platformList = listPlatforms();
                if (count($platformList) > 0) {
                ?>
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($platformList as $platform) {
                            ?>
                                <tr>
                                <td><?php echo($platform->getId()); ?></td>
                                <td><?php echo $platform->getName(); ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Platform">
                                            <a class="btn btn-success" href="edit.php?id=<?php echo $platform->getId(); ?>">Edit</a>

                                            <form name="delete_platform" action="delete.php" method="POST" style="display: inline;">
                                                <input type="hidden" name="platformId" value="<?php echo $platform->getId(); ?>" />
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
                        No platforms are yet available.
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>