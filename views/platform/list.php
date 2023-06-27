<?php
    echo('test1');
    require_once('../../controllers/PlatformController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <div th:replace="head"></div>
        <title>Listar plataformas</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <h1>Listado de plataformas</h1>
                <div class="col-6">
                    <a class="btn btn-primary" href="create.php">+ Crear plataforma</a>
                </div>
                <div class="col-12">
                    <?php
                    $platformList = listPlatforms();
                    if(count($platformList) > 0) {
                    ?>
                    <table class="table">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($platformList as $platform) {
                            ?>
                            <tr>
                                <td><?php echo $platform->getId(); ?></td>
                                <td><?php echo $platform->getName(); ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Platform">
                                        <a class="btn btn-success" href="edit.php?id=<?php echo $platform->getId();?>">Editar</a>
                                        &nbsp:&nbsp;
                                        <form name="delete_platform" action="delete.php" method="POST" style="display: inline;">
                                            <input type="hidden" name="platformId" value="<?php echo $platform->getId();?>" />
                                            <button type="submit" class="btn btn-danger">Borrar</button>  
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
                        Aun no existen plataformas.
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </body> 

</html>