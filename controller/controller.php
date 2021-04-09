<?php

class Controller
{

	// Incluir el template al llamar a esta función
	public function template()
	{
		include "view/template.php";
	}

	//Muestra el modulo de la vista obteniendo el valor de $_GET
	public function rutasController()
	{
		//limpiamos la url si se envía valor por el método get o no para redirigir a una dirección
		if (isset($_GET["action"])) {
			$enlace = $_GET["action"];
		}else{
			$enlace = "index";
		}

		$respuesta = Rutas::rutasModel($enlace);

		include $respuesta;
	}

	//Registrar un producto
	public function registroProductoController()
	{
		if (isset($_POST['nombreProductoRegistrar']) && isset($_POST['referenciaRegistrar']) && isset($_POST['precioRegistrar']) && isset($_POST['pesoRegistrar']) && isset($_POST['categoriaRegistrar']) && isset($_POST['stockRegistrar']) && isset($_POST['fechaCreacionRegistrar'])) {
			
			if ($_POST['nombreProductoRegistrar'] <> "" && $_POST['referenciaRegistrar'] <> "" && $_POST['precioRegistrar'] <> "" && $_POST['pesoRegistrar'] <> "" && $_POST['categoriaRegistrar'] <> "" && $_POST['stockRegistrar'] <> "" && $_POST['fechaCreacionRegistrar'] <> "") {

				$datos = array(	"nombre"=>$_POST['nombreProductoRegistrar'],
								"referencia"=>$_POST['referenciaRegistrar'],
								"precio"=>$_POST['precioRegistrar'],
								"peso"=>$_POST['pesoRegistrar'],
								"categoria"=>$_POST['categoriaRegistrar'],
								"stock"=>$_POST['stockRegistrar'],
								"fechaCreacion"=>$_POST['fechaCreacionRegistrar']);

					$respuesta = Datos::registroProductoModel($datos, "Producto");
					if ($respuesta == "Success") {
						header("location:ok");
					}else
					{
						header("location:index.php");
					}		
			}	
			
		}
		
	}


	//visualizar todos los registros de los productos
	public function mostrarProductoController()
	{
		$respuesta = Datos::mostrarProductoModel("Producto");

		foreach ($respuesta as $key => $value) {
			echo '<tr>
						<td>'.$value["idProducto"].'</td>
						<td>'.$value["nombre"].'</td>
						<td>'.$value["referencia"].'</td>
						<td>'.$value["precio"].'</td>
						<td>'.$value["peso"].'</td>
						<td>'.$value["categoria"].'</td>
						<td>'.$value["stock"].'</td>
						<td>'.$value["fechaCreacion"].'</td>
						<td>'.$value["fechaUltimaVenta"].'</td>
						<td><a href="index.php?action=productos&idVender='.$value["idProducto"].'"><button type="button" class="btn btn-success">Vender</button></a></td>
						<td><a href="index.php?action=editar&idEditar='.$value["idProducto"].'"><button type="button" class="btn btn-secondary">Editar</button></a></td>
						<td><a href="index.php?action=productos&idEliminar='.$value["idProducto"].'"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
					</tr>';
		}
	}

	//Editar Producto
	public function editarProductoController()
	{
		if (isset($_GET['idEditar'])) {
			$datos = $_GET['idEditar'];

			$respuesta = Datos::editarProductoModel($datos, "Producto");
		echo '<div class="mb-3">
			  	<input type="hidden" name="idProductoEditar" value="'.$respuesta["idProducto"].'">
		    	<label for="nombreProductoEditar" class="form-label">Nombre Producto</label>
		    	<input type="text" class="form-control" id="nombreProductoEditar" name="nombreProductoEditar"  placeholder="Ingrese nombre no mayor a 60 caracteres" maxlength="60" value="'.$respuesta["nombre"].'" required>
			  </div>
			  <div class="mb-3">
		    <label for="referenciaEditar" class="form-label">Referencia</label>
		    <input type="text" class="form-control" id="referenciaEditar" name="referenciaEditar"  placeholder="Ingrese nombre referencia no mayor a 30 caracteres" maxlength="30" value="'.$respuesta["referencia"].'" required>
		  </div>
		  <div class="mb-3">
		    <label for="precioEditar" class="form-label">Precio</label>
		    <input type="number" class="form-control" id="precioEditar" name="precioEditar"  placeholder="Ingrese precio del producto" maxlength="10" value="'.$respuesta["precio"].'" required>
		  </div>
		  <div class="mb-3">
		    <label for="pesoEditar" class="form-label">Peso</label>
		    <input type="number" class="form-control" id="pesoEditar" name="pesoEditar"  placeholder="Ingrese el peso del producto en gramos" maxlength="10" value="'.$respuesta["peso"].'" required>
		  </div>
		  <div class="mb-3">
		    <label for="categoriaEditar" class="form-label">Categoría</label>
		    <input type="text" class="form-control" id="categoriaEditar" name="categoriaEditar"  placeholder="Ingrese Categoría del producto" maxlength="20" value="'.$respuesta["categoria"].'" required>
		  </div>
		  <div class="mb-3">
		    <label for="stockEditar" class="form-label">Stock</label>
		    <input type="number" class="form-control" id="stockEditar" name="stockEditar"  placeholder="Ingrese las existencias actuales del producto" maxlength="10" value="'.$respuesta["stock"].'" required>
		  </div>
		  <div class="mb-3">
		    <label for="fechaCreacionEditar" class="form-label">Fecha Creación</label>
		    <input type="date" class="form-control" id="fechaCreacionEditar" name="fechaCreacionEditar"  placeholder="Fecha de Creación del producto" value="'.$respuesta["fechaCreacion"].'" readonly required>
		  </div>
			  <button type="submit" class="btn btn-primary">Editar</button>';
		}
	}

	//Actualizar Producto
	public function actualizarProductoController()
	{
		if (isset($_POST["idProductoEditar"])) {

			$datos = array(	"idProducto"=>$_POST["idProductoEditar"],
							"nombre"=>$_POST["nombreProductoEditar"],
							"referencia"=>$_POST["referenciaEditar"],
							"precio"=>$_POST["precioEditar"],
							"peso"=>$_POST["pesoEditar"],
							"categoria"=>$_POST["categoriaEditar"],
							"stock"=>$_POST["stockEditar"],
							"fechaCreacion"=>$_POST["fechaCreacionEditar"]
							);

				$respuesta = Datos::actualizarProductoModel($datos, "Producto");

				if ($respuesta == "Success") {
					header("location:cambio");
				}else
				{
					echo "Error";
				}
		}
	}

	//Eliminar Producto
	public function eliminarProductoController()
	{
		if (isset($_GET["idEliminar"])) {
			
			$datos = $_GET["idEliminar"];

			$respuesta = Datos::eliminarProductoModel($datos, "Producto");

			if ($respuesta == "Success") {
				header("location:productos");
			}else
			{
				echo "Error";
			}

		}
	
	}

	public function ventaProductoController()
	{
		if (isset($_GET['idVender'])) {
			
			$datos = $_GET['idVender'];
			var_dump($datos);
			$respuesta = Datos::editarProductoModel($datos, "Producto");
			if ($respuesta["stock"] > 0) {
				$datos = array( "idProducto"=>$respuesta["idProducto"],
								"stock"=>$respuesta["stock"]-1,
								"fechaUltimaVenta"=>date("Y-m-d G:i:s")
								);
				$respuesta = Datos::ventaProductoModel($datos, "Producto");
				if ($respuesta == "Success") {
					header("location:vendido");
				}else{
					echo "Error";
				}
			}else
			{
				header("location:novendido");
			}
		}
	}
	
}
