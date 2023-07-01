<?php
    require_once('../../controllers/DirectorController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include '../../head.html'; ?>
        <title>List of directors</title>
    </head>
    <body>
        <div class="container" style="padding:24px">
            <div class="row">
                <h1>List of directors</h1>
                <div class="col-6" style="padding: 8px">
                    <a class="btn btn-info" href="../person/create.php">+ Add person</a>
                </div>
                <div class="col-12" style="padding:24px">
                    <?php
                    $directorsList = listDirectors();
                    if(count($directorsList) > 0) {
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
                                foreach($directorsList as $director) {
                            ?>
                            <tr>
                                <td><?php echo $director->getId(); ?></td>
                                <td><?php echo $director->getName(); ?></td>
                                <td><?php echo $director->getSurname(); ?></td>
                                <td><?php echo $director->getBirthDate(); ?></td>
                                <td><?php echo $director->getNationality(); ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Director">
                                        <a class="btn btn-success" href="../person/edit.php?id=<?php echo $director->getId();?>">Edit</a>
                                        &nbsp:&nbsp;
                                        <form name="delete_director" action="../person/delete.php" method="POST" style="display: inline;">
                                            <input type="hidden" name="directorId" value="<?php echo $director->getId();?>" />
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