<?php require("layout/header.php"); ?>

<div class="container">

<div id="text">
    <h2 class="neonTitle">Tus part<span id="offset">icipa</span>ntes</h2>
</div>

    <table id="tabla">
        <thead>
            <tr class="text-center" id="header">
                <th>Torneo</th>
                <th>Nick</th>
                <th>Codigo</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($formularios->filas) :
                foreach ($formularios->filas as $fila) :
            ?>
            <tr >
                <td><?php echo $fila->nombre_torneo; ?></td>
                <td><?php echo $fila->nick; ?></td>
                <td><?php echo $fila->codigo; ?></td>
                <td><?php echo date('d/m/Y', strtotime($fila->fecha)) ?></td>
            </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    <a href="<?php echo URLSITE . '?c=formularios&m=ImprimirParticipantes&id=' . $fila->id_torneo;?>">
                        <button type="button" class="boton">Imprimir Lista</button>
                    <a href="<?php echo URLSITE . '?c=empresas';?>">
                        <button type="button" class="boton">Regresar</button>
                </td>
            </a>
            </tr>
        </tfoot>
    </table>
</div>

<?php require("layout/footer.php"); ?>