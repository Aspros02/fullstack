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
        <h2 class="neonTitle">Empres<span id="offset">as</span></h2>
    </div>

    <table id="tabla">
        <thead>
            <tr class="text-center" id="header">
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($empresas->filas) :
                foreach ($empresas->filas as $fila) :
            ?>
            <tr style="text-align: center">
                <td><?php echo $fila->nombre; ?></td>
                <td><?php echo $fila->descripcion; ?></td>

                <td style="text-align: center; width: 50%;" >
                    <a href="index.php?c=empresas&m=editar&id=<?php echo $fila->id; ?>">
                        <button type="button" class="boton">Editar</button></a>
                    <a href="index.php?c=juegos&m=nuevo&id_empresa=<?php echo $fila->id; ?>">
                        <button type="button" class="boton">Añadir Juego</button></a>
                    <a href="index.php?c=juegos&id_empresa=<?php echo $fila->id; ?>">
                        <button type="button" class="boton">Mis Juegos</button></a>
                    <a href="index.php?c=torneos&m=nuevo&id_empresa=<?php echo $fila->id; ?>">
                        <button type="button" class="boton">Crear Torneo</button></a>
                    <a href="index.php?c=torneos&id_empresa=<?php echo $fila->id; ?>">
                        <button type="button" class="boton">Mis Torneos</button></a>
                    <a href="index.php?c=empresas&m=borrar&id=<?php echo $fila->id; ?>">
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
                    <a href="index.php?c=empresas&m=nuevo">
                        <button type="button" class="boton">Añadir Empresa</button>
                    </a>
                </td>
            </tr>
        </tfoot>
    </table>
</div>

<?php require("layout/footer.php"); ?>