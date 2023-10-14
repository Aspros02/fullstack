<?php require("layout/header.php"); ?>

<div class="container">
       <div id="text">
       <h2 class="neonTitle">Usu<span id="offset">ari</span>os</h2>
       </div>

       <form action="<?php echo '?c=usuarios&m=' .
                     ($opcion == 'EDITAR' ? 'modificar&id=' . $usuario->id : 'insertar'); ?>" 
              method="POST"
              enctype="multipart/form-data">
              
              <label for="usuario" class="form-label">Usuario</label>
              <input type="text" class="form-control" name="usuario" id="usuario" 
                     value="<?php echo ($opcion == 'EDITAR' ? $usuario->usuario : ''); ?>" required />

              <br />
              <label for="contrasena" class="form-label">Contraseña</label>
              <input type="text" class="form-control" name="contrasena" id="contrasena" 
                     value="<?php echo ($opcion == 'EDITAR' ? CRYPT::Desencriptar($usuario->contrasena) : ''); ?>" required />

              <br />
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="nombre" 
                     value="<?php echo ($opcion == 'EDITAR' ? $usuario->nombre : ''); ?>" required />

              <br />

              <label for="containerRadio" class="form-label">Administrador</label>
              <div id="containerRadio" name="containerRadio">
                     <label class="form-check-label" for="activo1">Sí</label>
                     <input type="radio" name="admin" id="activo1" value="1"
                            <?php 
                            if (($opcion == 'EDITAR') && ($usuario->admin == 1)) 
                                   echo 'checked';
                            ?>
                            class="form-check-input" required>
                     
                     <label class="form-check-label" for="activo2">No</label>
                     <input type="radio" name="admin" id="activo2" value="0"
                            <?php if (($opcion == 'EDITAR') && ($usuario->admin == 0)) echo 'checked'; ?>
                            class="form-check-input">
              </div>
              <br />
              <button type="submit" class="boton">Aceptar</button>

              <a href="<?php echo URLSITE . '?c=usuarios';?>">
                     <button type="button" class="boton">Cancelar</button>
              </a>
       </form>
</div>
<?php require("layout/footer.php"); ?>