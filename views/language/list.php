<?php
    echo('test1');
    require_once('../../controllers/LanguageController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>List of languages</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>List of languages</h1>
                <div class="col-6">
                    <a class="btn btn-info" href="create.php">+ Add language</a>
                </div>
                <div class="col-12">
                    <?php
                    $languageList = listLanguages();
                    if(count($languageList) > 0) {
                    ?>
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>ISO code</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($languageList as $language) {
                            ?>
                            <tr>
                                <td><?php echo$language->getId(); ?></td>
                                <td><?php echo $language->getName(); ?></td>
                                <td><?php echo $language->getISOCode(); ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Language">
                                        <a class="btn btn-success" href="edit.php?id=<?php echo $language->getId();?>">Edit</a>
                                        &nbsp:&nbsp;
                                        <form name="delete_language" action="delete.php" method="POST" style="display: inline;">
                                            <input type="hidden" name="platformId" value="<?php echo $language->getId();?>" />
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