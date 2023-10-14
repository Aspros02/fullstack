<?php require("layout/header.php"); ?>

<div class="container">

<div id="text">
    <h2 class="neonTitle">Tor<span id="offset">ne</span>os</h2>
</div>

    <table id="tabla">
        <thead>
            <tr class="text-center" id="header">
                <th>Empresa</th>
                <th>Juego</th>
                <th>Nombre</th>
                <th>Fecha</th>
                
                <?php 
                require_once('controller/login.php');

                if (LoginControlador::Logueado())
                {
                    ?>
                    <th>Opciones</th>
                    <?php 
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($torneos->filas) :
                foreach ($torneos->filas as $fila) :
            ?>
            <tr >
                <td><?php echo $fila->empresa; ?></td>
                <td><?php echo $fila->juego; ?></td>
                <td><?php echo $fila->nombre; ?></td>
                <td><?php echo date('d/m/Y', strtotime($fila->fecha)) ?></td>

                <?php 
                require_once('controller/login.php');

                if (LoginControlador::Logueado())
                {
                ?>
                    <td>
                        <a href="index.php?c=torneos&m=editar&id=<?php echo $fila->id; ?>">
                            <button type="button" class="boton">Editar</button></a>
                        <a href="index.php?c=formularios&m=index&id=<?php echo $fila->id; ?>">
                            <button type="button" class="boton">Consultar Participantes</button></a>
                        <a href="index.php?c=torneos&m=borrar&id=<?php echo $fila->id; ?>">
                            <button type="button" class="boton" 
                                    onclick="return confirm('¿Estás seguro de borrar el registro <?php echo $fila->id; ?>?');">Borrar</button></a>
                    </td>
                <?php 
                }
                ?>
            </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
        <tfoot>
            <tr>
            <?php 
                require_once('controller/login.php');

                if (LoginControlador::Logueado())
                {
                ?>
                    <td colspan="6">
                        <a href="<?php echo URLSITE . '?c=empresas';?>">
                            <button type="button" class="boton">Regresar</button>
                    </td>
                <?php 
                }else {
                    ?>
                    <td colspan="6">
                        <a href="<?php echo URLSITE . '?c=app';?>">
                            <button type="button" class="boton">Regresar</button>
                    </td>
                <?php 
                }
                ?>
            </a>
            </tr>
        </tfoot>
    </table>
</div>
<?php require("layout/footer.php"); ?>