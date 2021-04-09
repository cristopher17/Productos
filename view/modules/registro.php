<div class="container">
	<div class="align-items-center">
		<form method="post">
			<legend>Registrar Producto</legend>
		  <div class="mb-3">
		    <label for="nombreProductoRegistrar" class="form-label">Nombre Producto</label>
		    <input type="text" class="form-control" id="nombreProductoRegistrar" name="nombreProductoRegistrar"  placeholder="Ingrese nombre no mayor a 60 caracteres" maxlength="60" required>
		  </div>
		  <div class="mb-3">
		    <label for="referenciaRegistrar" class="form-label">Referencia</label>
		    <input type="text" class="form-control" id="referenciaRegistrar" name="referenciaRegistrar"  placeholder="Ingrese nombre referencia no mayor a 30 caracteres" maxlength="30" required>
		  </div>
		  <div class="mb-3">
		    <label for="precioRegistrar" class="form-label">Precio</label>
		    <input type="number" class="form-control" id="precioRegistrar" name="precioRegistrar"  placeholder="Ingrese precio del producto" maxlength="10" required>
		  </div>
		  <div class="mb-3">
		    <label for="pesoRegistrar" class="form-label">Peso</label>
		    <input type="number" class="form-control" id="pesoRegistrar" name="pesoRegistrar"  placeholder="Ingrese el peso del producto en gramos" maxlength="10" required>
		  </div>
		  <div class="mb-3">
		    <label for="categoriaRegistrar" class="form-label">Categoría</label>
		    <input type="text" class="form-control" id="categoriaRegistrar" name="categoriaRegistrar"  placeholder="Ingrese Categoría del producto" maxlength="20" required>
		  </div>
		  <div class="mb-3">
		    <label for="stockRegistrar" class="form-label">Stock</label>
		    <input type="number" class="form-control" id="stockRegistrar" name="stockRegistrar"  placeholder="Ingrese las existencias actuales del producto" maxlength="10" required>
		  </div>
		  <div class="mb-3">
		    <label for="fechaCreacionRegistrar" class="form-label">Fecha Creación</label>
		    <input type="date" class="form-control" id="fechaCreacionRegistrar" name="fechaCreacionRegistrar"  placeholder="Fecha de Creación del producto" value="<?php echo date("Y-m-d") ?>" readonly require>
		  </div>		  
		  <button type="submit" class="btn btn-primary">Registrar</button>
		</form>
	</div>
</div>


<?php
$registro = new Controller();
$registro->registroProductoController();

if (isset($_GET['action'])) {
	if ($_GET['action'] == "ok") {
		echo "Registro Satisfactorio";
	}
}
