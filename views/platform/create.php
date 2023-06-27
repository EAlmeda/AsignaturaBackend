<?php
    require_once('../../controllers/PlatformController.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <div th:replace="head"></div>
        <title>Crear plataforma</title>
    </head>
    <body>
        <div class="container">
            <?php
                $sendData = false;
                $platformCreated = false;
                if(isset($_POST['platformName'])) {
                    $sendData = true;
                }
                if($sendData) {
                    if(isset($_POST['platformName'])) {
                        $platformCreated = storePlatform($_POST['platformName']);
                    }
                }

                if(!$sendData) {
            ?>
            <div class="row">
                <div class="col-12">
                    <h1>Crear plataforma</h1>
                </div>
                <div class="col-12">
                    <form name="create-platform" action="" method="POST">
                        <div class="mb-3">
                            <label form="platformName" class="form-label">Nombre plataforma</label>
                            <input id="platformName" name="platformName" type="text" placeholder="Introduce el nombre de la plataforma" class="form-control" required/>
                        </div>
                        <input type="submit" value="Crear" class="btn btn-primary" name="createBtn"/>
                    </form>
                </div>
            </div>
            <?php 
                } else {
                    if($platformCreated) {
                        ?>
                    <div class="row">
                        <div class="alert alert-success" role="alert">
                            Plataforma creada correctamente.<br><a href="list.php">Volver al listado de plataformas.</a>
                        </div>
                    </div>
                    <?php
                    } else {
                        ?>
                    <div class="row">
                        <div class="alert alert-danger" role="alert">
                            La plataforma no se ha creado correctamente. <br><a href="create.php">Volver a intentarlo</a>
                        </div>
                    </div>
                    <?php
                    }
                }
                ?>
        </div>
    </body> 
</html>