<?php require("layout/header.php"); ?>

<div class="container">

    <div id="text">
        <h2 class="neonTitle">Jueg<span id="offset">os</span></h2>
    </div>

    <table id="tabla">
        <thead>
            <tr class="text-center" id="header">
                <th>Empresa</th>
                <th>Juego</th>
                <th>Categoría</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($juegos->filas) :
                foreach ($juegos->filas as $fila) :
            ?>
            <tr>
                <td><?php echo $fila->empresa; ?></td>
                <td><?php echo $fila->nombre; ?></td>
                <td><?php echo $fila->categoria; ?></td>

                <td>
                    <a href="index.php?c=juegos&m=editar&id=<?php echo $fila->id; ?>">
                        <button type="button" class="boton">Editar</button></a>
                    <a href="index.php?c=juegos&m=borrar&id=<?php echo $fila->id; ?>">
                        <button type="button" class="boton" 
                                onclick="return confirm('¿Estás seguro de borrar el registro <?php echo $fila->id; ?>?');">Borrar</button></a>
                </td>
            </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    <a href="<?php echo URLSITE . '?c=empresas';?>">
                        <button type="button" class="boton">Regresar</button>
                </td>
            </a>
            </tr>
        </tfoot>
    </table>

</div>
<?php require("layout/footer.php"); ?>