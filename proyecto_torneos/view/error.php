<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();
require_once('../config.php'); 
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="<?php echo URLSITE; ?>view/css/app.css">

        <title>CRUD MVC</title>
    </head>

    <body>
        <div class="container">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">¡Error!</h4>
                <p>Ha habido un error al realizar la operación:</p>
                <p style="font-style: italic;"><?php echo $_SESSION["CRUDMVC_ERROR"]; ?></p>
                <hr>
                <p class="mb-0">
                    <button type="submit" class="boton" onclick="window.history.back()">Reintentar</button>
                    <a href="<?php echo URLSITE; ?>"><button type="button" class="boton">Cancelar</button></a>
                </p>
            </div>
        </div>
    </body>
</html>