<?php require("layout/header.php"); ?>

<div class="container">
       <div id="text">
       <h2 class="neonTitle">Jueg<span id="offset">os</span></h2>
       </div>

       <form action="<?php echo '?c=juegos&m=' .
                     ($opcion == 'EDITAR' ? 'modificar&id=' . $juegos->id : 'insertar'); ?>" 
              method="POST">

       <label for="id_empresa" class="form-label">ID Empresa</label>
       <input type="text" class="form-control" name="id_empresa" id="id_empresa" 
              value="<?php echo $juegos->id_empresa ; ?>" readonly />
       <br />

       <label for="nombre" class="form-label">Nombre</label>
       <input type="text" class="form-control" name="nombre" id="nombre" 
              value="<?php echo ($opcion == 'EDITAR' ? $juegos->nombre : ''); ?>" required />
       <br>

       <label for="categoria" class="form-label">Categoría</label>
       <select class="form-control" name="id_categoria" id="id_categoria" required>
       <?php
       if ($opcion == 'NUEVA') :
       ?>
              <option value="" disabled selected>Seleccionar categoria</option>
       <?php
       endif;

       foreach ($categorias->filas AS $categoria) :
       ?>
              <option value="<?php echo $categoria->id; ?>"   
              <?php 
              if ($opcion == 'EDITAR')
                     echo ($categoria->id == $juegos->id_categoria ? 'selected' : ''); ?>
              >
                     <?php echo $categoria->nombre; ?>
              </option>
       <?php
       endforeach;
       ?>
       </select>
       <br>

       <button type="submit" class="boton">Aceptar</button>

       <a href="<?php echo URLSITE . '?c=juegos&m=seleccionar&id_empresa=' . $juegos->id_empresa ;?>">
              <button type="button" class="boton">Cancelar</button>
       </a>
       </form>
</div>
<?php require("layout/footer.php"); ?>