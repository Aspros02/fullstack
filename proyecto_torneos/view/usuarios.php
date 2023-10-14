<?php 

require_once('controller/login.php');

if (!LoginControlador::Logueado())
{
    header('Location: '. URLSITE . 'view/login.php');
    die();
}

require("layout/header.php"); ?>

<div class="container">
    <div id="text">
        <h2 class="neonTitle">Usu<span id="offset">ari</span>os</h2>
    </div>

    <table id="tabla">
        <thead>
            <tr class="text-center" id="header">
                <th>Usuario</th>
                <th>Administrador</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($usuarios->filas) :
                foreach ($usuarios->filas as $fila) :
            ?>
            <tr>
                <td><?php echo $fila->usuario; ?></td>
                <td><?php echo ($fila->admin == 0 ? 'No' : 'Sí'); ?></td>

                <td style="text-align: center;">
                    <a href="?c=usuarios&m=editar&id=<?php echo $fila->id; ?>">
                        <button type="button" class="boton">Editar</button></a>
                    <a href="?c=usuarios&m=borrar&id=<?php echo $fila->id; ?>">
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
                <td colspan="3">
                    <a href="?c=usuarios&m=nuevo">
                        <button type="button" class="boton">Nuevo</button>
                    </a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<?php require("layout/footer.php"); ?>