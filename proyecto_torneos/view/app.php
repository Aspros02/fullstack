<?php 
require("layout/header.php"); 
?>

<div id="containerFirst">
    <h2 class="neonLogo">GA<span id="offset">CE</span></h2>
    <h5 class="neonLogoSub">Forma parte de nuestro universo</span></h5>
</div>

<!-- PRESENTACIÓN -->
<div class="container">
    <p id="centrado">
        Consulta nuestra variedad de torneos mientras te mantienes al tanto de la actualidad de la industria. Descubre nuevas empresas del sector
        y disfruta de aquellas que ya conoces. Conoce a otros jugadores y enfréntate a nuevos retos. Descubre tu lugar en nuestro universo.
    </p>

    <br />

    <h4 class="secuenciaPasos">1º Localiza tu torneo</h4>
    <h4 class="secuenciaPasos">2º Inscríbete y guarda tu código</h4>
    <h4 class="secuenciaPasos">3º Preséntalo en el torneo, ¡A JUGAR!</h4>
    
</div>

<!-- INSTRUCCIONES -->
<div class="container">
    <div class="wrapper">
        <div class="carousel">
            <img src="fotos/retroSalon.jpg" alt="Foto de salón recreativo con máquinas arcade." draggable="false">
            <img src="fotos/participante.jpg" alt="Persona sentada frente a un monitor, jugando en un torneo de videojuegos." draggable="false">
            <img src="fotos/maquinasArcade.jpg" alt="Foto de salón recreativo con máquinas arcade." draggable="false">
            <img src="fotos/teclado.jpg" alt="Imagen de un teclado negro con luz roja." draggable="false">
            <img src="fotos/puntuacion.jpg" alt="Panel led con puntuaciones de colores de un torneo." draggable="false">
            <img src="fotos/pantalla.jpg" alt="Monitor personal mostrando el logo de un videojuego, ciberpunk." draggable="false">
        </div>
        <i id="left" class="fa-solid fa-angle-left"></i>
        <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
</div>

<!-- TABLA TORNEOS -->
<div class="container">
    <div id="text">
        <h2 class="neonTitle">Torne<span id="offset">os </span>act<span id="offset">ual</span>es</h2>
    </div>

    <table id="tabla">
        <thead>
            <tr class="text-center" id="header">
                <th>Empresa</th>
                <th>Juego</th>
                <th>Nombre</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($torneos->filas) :
                foreach ($torneos->filas as $fila) :
            ?>
            <tr style="text-align: center">
                <td><?php echo $fila->empresa; ?></td>
                <td><?php echo $fila->juego; ?></td>
                <td><?php echo $fila->nombre; ?></td>
                <td><?php echo date('d/m/Y', strtotime($fila->fecha)) ?></td>
            </tr>
            <tr>
                <td colspan="4">
                    <a href="index.php?c=formularios&m=nuevo&id=<?php echo $fila->id; ?>">
                        <button type="button" class="botonRegistro">Registrarme</button></a>
                </td>
            </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>
</div>

<!-- TARJETAS DE EMPRESAS -->
<script src="https://kit.fontawesome.com/95a02bd20d.js"></script>

<div class="container">
    <div id="text">
        <h2 class="neonTitle">Empres<span id="offset">as part</span>icipantes</h2>
    </div>
<?php
    if ($empresas->filas) :
        foreach ($empresas->filas as $fila) :
    ?>
        <div class="card">
            <div class="face face1">
                <div class="content">
                    <img src="<?php echo $fila->foto_url; ?>" height="70" class="imgTarjeta">   
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <h3><?php echo $fila->nombre; ?></h3>
                    <p><?php echo $fila->descripcion; ?></p>
                    <a href="index.php?c=torneos&id_empresa=<?php echo $fila->id; ?>" type="button">Torneos</a>
                </div>
            </div>
        </div>  
    <?php
        endforeach;
    endif;
    ?>    
</div>

<!-- TABLA JUEGOS -->
<div class="container">
    <div id="text">
        <h2 class="neonTitle">Jueg<span id="offset">os y Cat</span>egorias</h2>
    </div>

    <table id="juegos">
        <thead>
            <tr class="text-center" id="header">
                <th>Empresa</th>
                <th> </th>
                <th>Juego</th>
                <th> </th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($juegos->filas) :
                foreach ($juegos->filas as $fila) :
            ?>
            <tr style="text-align: center;">
                <td><?php echo $fila->empresa; ?></td>
                <td> </td>
                <td><?php echo $fila->nombre; ?></td>
                <td> </td>
                <td><?php echo $fila->categoria; ?></td>
            </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>

    <table id="categorias">
        <thead>
            <tr class="text-center" id="header">
                <th> </th>
                <th>Categorias</th>
                <th>Presente actualmente</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($categorias->filas) :
                foreach ($categorias->filas as $fila) :
            ?>
            <tr style="text-align: center;">
                <td> </td>
                <td><?php echo $fila->nombre; ?></td>
                <td> 
                <?php
                    if ($juegos->filas) :
                        foreach ($juegos->filas as $juego) :
                 
                            if ($juego->id_categoria == $fila->id) :
                                ?>
                                    <i class="fas fa-check"></i>
                                <?php
                                break;
                            endif;                            
                        endforeach;
                    endif;
                    ?>
                </td>
            </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>
</div>

<div class="aviso-cookies" id="aviso-cookies">
		<img class="galleta" src="fotos/cookie.png" alt="Galleta">
		<h3 class="titulo">Cookies</h3>
		<p class="parrafo">Utilizamos cookies propias y de terceros para mejorar nuestros servicios.</p>
		<button class="boton" id="btn-aceptar-cookies">De acuerdo</button>
		<a class="enlace" href="<?php echo URLSITE . '?c=cookies' ;?>">Aviso de Cookies</a>
	</div>
	<div class="fondo-aviso-cookies" id="fondo-aviso-cookies"></div>

	<script src="js/aviso-cookies.js"></script>

<?php require("layout/footer.php"); ?>