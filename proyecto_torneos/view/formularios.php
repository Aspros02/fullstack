<?php require("layout/header.php"); ?>

<div class="container">
       <div id="text">
       <h2 class="neonTitle">Regi<span id="offset">s</span>tro</h2>
       </div>

       <form action="<?php echo '?c=formularios&m=insertar'?>" 
              method="POST">

       <label for="nombre_torneo" class="form-label">Torneo</label>
       <input type="text" class="form-control" name="nombre_torneo" id="nombre_torneo" 
              value="<?php echo ($torneo->nombre); ?>" readonly />
       <br>

       <label for="id_torneo" class="form-label">ID Torneo</label>
       <input type="text" class="form-control" name="id_torneo" id="id_torneo" 
              value="<?php echo ($torneo->id); ?>" readonly />
       <br>

       <label for="empresa" class="form-label">Empresa</label>
       <input type="text" class="form-control" name="empresa" id="empresa" 
              value="<?php echo ($torneo->id_empresa); ?>" readonly />
       <br>

       <label for="juego" class="form-label">Juego</label>
       <input type="text" class="form-control" name="juego" id="juego" 
              value="<?php echo ($torneo->id_juego); ?>" readonly />
       <br>

       <label for="fecha" class="form-label">Fecha</label>
       <input type="text" class="form-control" name="fecha" id="fecha" 
              value="<?php echo (date('Y-m-d', strtotime($torneo->fecha))); ?>" 
              readonly />
       <br />

       <label for="nick" class="form-label">Nick</label>
       <input type="text" class="form-control" name="nick" id="nick" 
              value="" required />
       <br>

       <label for="codigo" class="form-label">Código</label>
       <input type="text" class="form-control" name="codigo" id="codigo" 
              value="<?php
                     $bytes = random_bytes(20);
                     echo (bin2hex($bytes));
              ?>" readonly />
       <br>

       <button type="submit" class="boton" onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();">Registrar</button>

       <a href="<?php echo URLSITE . '?c=formularios';?>">
       <button type="button" class="boton">Regresar</button>
       </a>
       </form>

       <!-- $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                     function generate_string($input, $strength = 16) {
                     $input_length = strlen($input);
                     $random_string = '';

                     for($i = 0; $i < $strength; $i++) {
                            $random_character = $input[mt_rand(0, $input_length - 1)];
                            $random_string .= $random_character;
                     }
                     return $random_string;
                     }
                     echo generate_string($permitted_chars, 20); -->
</div>

<?php require("layout/footer.php"); ?>