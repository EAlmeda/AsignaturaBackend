<?php
    require_once('../../controllers/PersonController.php');
?>
<!DOCTYPE html lang="es">
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>List of people</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>List of people</h1>
                <div class="col-6">
                    <a class="btn btn-info" href="create.php">+ Add person</a>
                </div>
                <div class="col-12">
                    <?php
                    $peopleList = listPeople();
                    if(count($peopleList) > 0) {
                    ?>
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Birthdate</th>
                            <th>Nationality</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($peopleList as $person) {
                            ?>
                            <tr>
                                <td><?php echo $person->getId(); ?></td>
                                <td><?php echo $person->getName(); ?></td>
                                <td><?php echo $person->getSurname(); ?></td>
                                <td><?php echo $person->getBirthDate(); ?></td>
                                <td><?php echo $person->getNationality(); ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="person">
                                        <a class="btn btn-success" href="edit.php?id=<?php echo $person->getId();?>">Edit</a>
                                        &nbsp:&nbsp;
                                        <form name="delete_person" action="delete.php" method="POST" style="display: inline;">
                                            <input type="hidden" name="personId" value="<?php echo $person->getId();?>" />
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
                        }  else {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        No people are yet available.
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </body> 

</html>