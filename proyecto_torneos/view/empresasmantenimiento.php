<?php require("layout/header.php"); ?>

<div class="container">
       <div id="text">
       <h2 class="neonTitle">Empres<span id="offset">as</span></h2>
       </div>

       <form action="<?php echo '?c=empresas&m=' .
                     ($opcion == 'EDITAR' ? 'modificar&id=' . $empresa->id : 'insertar'); ?>" method="POST" enctype="multipart/form-data">

       <label for="nombre" class="form-label">Nombre</label>
       <input type="text" class="form-control" name="nombre" id="nombre" 
              value="<?php echo ($opcion == 'EDITAR' ? $empresa->nombre : ''); ?>" required />
       <br />

       <label for="descripcion" class="form-label">Descripcion</label>
       <input type="text" class="form-control" name="descripcion" id="descripcion" 
              value="<?php echo ($opcion == 'EDITAR' ? $empresa->descripcion : ''); ?>" required />
       <br />

       <label for="foto" class="form-label">Foto</label>
              <input type="file" class="form-control" name="foto" id="foto"
                     accept=".jpg,.png" required>
       <br />

       <button type="submit" class="boton">Aceptar</button>

       <a href="<?php echo URLSITE . '?c=empresas';?>">
       <button type="button" class="boton">Cancelar</button>
       </a>
       </form>
</div>
<?php require("layout/footer.php"); ?>