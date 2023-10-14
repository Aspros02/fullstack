<?php require("layout/header.php"); ?>

<div class="container">
	<div id="text">
		<h2 class="neonTitle">Co<span id="offset">ntac</span>to</h2>
	</div>

	<form action="#" method="POST">
		<label for="nombre" class="form-label">Nombre</label><br />
		<input type="text" class="form-control" id="nombre" name="nombre"/>
		<br />

		<label for="email" class="form-label">Email</label><br />
		<input type="email" class="form-control" id="email" name="email" />
		<br />

		<label for="mensaje" class="form-label">Asunto</label><br />
		<textarea class="form-control" id="mensaje" name="mensaje" rows="8" cols="50"></textarea>
		<br />

		<button type="reset" class="boton">Enviar</button>
	</form>
</div>

<?php require("layout/footer.php"); ?>