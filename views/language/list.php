<?php
require_once('../../controllers/LanguageController.php');
?>
<!DOCTYPE html>
<html>

<head>
    <?php include '../../head.html'; ?>
    <title>List of languages</title>
</head>

<body>
    <div class="container" style="padding:24px">
        <div class="row">
            <h1>List of languages</h1>
            <div class="col-6" style="padding: 8px">
                <a class="btn btn-info" href="create.php">+ Add language</a>
            </div>
            <div class="col-12" style="padding:24px">
                <?php
                $languageList = listLanguages();
                if (count($languageList) > 0) {
                ?>
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>ISO code</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($languageList as $language) {
                            ?>
                                <tr>
                                    <td><?php echo $language->getId(); ?></td>
                                    <td><?php echo $language->getName(); ?></td>
                                    <td><?php echo $language->getISOCode(); ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Language">
                                            <a class="btn btn-success" href="edit.php?id=<?php echo $language->getId(); ?>">Edit</a>
                                            
                                            <form name="delete_language" action="delete.php" method="POST" style="display: inline;margin-left: 10px">
                                                <input type="hidden" name="languageId" value="<?php echo $language->getId(); ?>" />
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