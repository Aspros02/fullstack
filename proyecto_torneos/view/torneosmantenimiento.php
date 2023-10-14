<?php require("layout/header.php"); ?>

<div class="container">
       <div id="text">
       <h2 class="neonTitle">Tor<span id="offset">ne</span>os</h2>
       </div>

       <form action="<?php echo '?c=torneos&m=' .
                     ($opcion == 'EDITAR' ? 'modificar&id=' . $torneo->id : 'insertar'); ?>" 
              method="POST">

       <label for="id_empresa" class="form-label">ID Empresa</label>
       <input type="text" class="form-control" name="id_empresa" id="id_empresa" 
              value="<?php echo $torneo->id_empresa ; ?>" readonly />
       <br />

       <label for="id_juego" class="form-label">Juego</label>
       <select class="form-control" name="id_juego" id="id_juego" required>
       <?php
       if ($opcion == 'NUEVO') :
       ?>
              <option value="" disabled selected>Seleccionar juego</option>
       <?php
       endif;

       foreach ($juegos->filas AS $juego) :
       ?>
              <option value="<?php echo $juego->id; ?>"   
              <?php 
              if ($opcion == 'EDITAR')
                     echo ($juego->id == $torneo->id_juego ? 'selected' : ''); ?>
              >
                     <?php echo $juego->nombre; ?>
              </option>
       <?php
       endforeach;
       ?>
       </select>
       <br />

       <label for="nombre" class="form-label">Nombre</label>
       <input type="text" class="form-control" name="nombre" id="nombre" 
              value="<?php echo ($opcion == 'EDITAR' ? $torneo->nombre : ''); ?>" required />
       <br />

       <label for="fecha" class="form-label">Fecha</label>
       <input type="date" class="form-control" name="fecha" id="fecha" 
              value="<?php echo ($opcion == 'EDITAR' ? date('Y-m-d', strtotime($torneo->fecha)) : date('Y-m-d')); ?>" 
              required />
       <br />

       <button type="submit" class="boton">Aceptar</button>

       <a href="<?php echo URLSITE . '?c=torneos&m=index&id_empresa=' . $torneo->id_empresa ;?>">
              <button type="button" class="boton">Cancelar</button>
       </a>
       </form>
</div>
<?php require("layout/footer.php"); ?>