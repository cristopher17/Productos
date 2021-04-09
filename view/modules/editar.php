<div class="container">
	<div class="align-items-center">
		<form method="post">
			<legend>Editar Producto</legend>
		 	<?php
		 	$editar = new Controller();
		 	$editar->editarProductoController();
		 	?>
		</form>
	</div>
</div>

<?php

$actualizar = new Controller();
$actualizar->actualizarProductoController();




