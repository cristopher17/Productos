<?php

class Conexion
{
	public static function Conectar()
	{
		$link = new PDO("mysql:host=localhost;dbname=Konecta","root", "");
        return $link;
	}
}
