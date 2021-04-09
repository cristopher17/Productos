<?php

class Rutas
{
	public static function rutasModel($enlace)
	{
		if ($enlace == "registro" ||
			$enlace == "productos" ||
			$enlace == "editar") {
			
			$ruta = "view/modules/".$enlace.".php";
		}else if ($enlace == "index") {
			$ruta = "view/modules/inicio.php";
		}else if($enlace == "ok") {
			$ruta = "view/modules/registro.php";
		}else if ($enlace == "editar") {
			$ruta = "view/modules/editar.php";
		}else if ($enlace == "cambio") {
			$ruta = "view/modules/productos.php";
		}else if ($enlace == "vendido") {
			$ruta = "view/modules/productos.php";
		}else if ($enlace == "novendido") {
			$ruta = "view/modules/productos.php";
		}
		return $ruta;
	}
}
