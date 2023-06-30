<?php
    require_once('../../controllers/ActorController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>List of actors</title>
    </head>
    <body>
        <div class="container" style="padding:24px">
            <div class="row">
                <h1>List of actors</h1>
                <div class="col-6" style="padding: 8px">
                    <a class="btn btn-info" href="../person/create.php">+ Add person</a>
                </div>
                <div class="col-12" style="padding:24px">
                    <?php
                    $actorsList = listActors();
                    if(count($actorsList) > 0) {
                    ?>
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Birth Date</th>
                            <th>Nationality</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($actorsList as $actor) {
                            ?>
                            <tr>
                                <td><?php echo $actor->getId(); ?></td>
                                <td><?php echo $actor->getName(); ?></td>
                                <td><?php echo $actor->getSurname(); ?></td>
                                <td><?php echo $actor->getBirthDate(); ?></td>
                                <td><?php echo $actor->getNationality(); ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Actor">
                                        <a class="btn btn-success" href="../person/edit.php?id=<?php echo $actor->getId();?>">Edit</a>
                                        &nbsp:&nbsp;
                                        <form name="delete_actor" action="../person/delete.php" method="POST" style="display: inline;">
                                            <input type="hidden" name="actorId" value="<?php echo $actor->getId();?>" />
                                            <button type="submit" class="btn btn-danger">Delete</button>  
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }?>
                        </tbody>
                    </table>
                    <?php
                        } else {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        No languages are yet available.
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </body> 

</html>