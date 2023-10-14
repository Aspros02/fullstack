<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="view/css/app.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script src="js/efectos.js" defer></script>
    <title>Proyecto Final</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="efectoAmarillo">

    <a class="navbar-brand" id="navBarLogo" href="<?php echo URLSITE; ?>">
      <img src="imagenes/logoNuevo.png" alt="" width="100" id="imgLogo">
    </a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        <a class="nav-item nav-link active" href="<?php echo URLSITE . '?c=app'; ?>">Home</a>
      </div>
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="<?php echo URLSITE . '?c=noticias'; ?>">Noticias</a>
      </div>
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="<?php echo URLSITE . '?c=empresas'; ?>">Empresas</a>
      </div>

      <?php 
      require_once('controller/login.php');
      require_once('model/login.php');

      if (LoginControlador::Logueado() && $_SESSION['admin'] == 1)
      {
        ?>
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="<?php echo URLSITE . '?c=usuarios'; ?>">Usuarios</a>
      </div>
      <?php 
      }

      require_once('controller/login.php');

      if (LoginControlador::Logueado())
      {
        ?>
            <div class="navbar-nav">
              <a class="nav-item nav-link active" href="<?php echo URLSITE . '?c=salir&m=salir'; ?>">Salir</a>
            </div>
      <?php 
      }
      ?>
    </div>
  </nav>
