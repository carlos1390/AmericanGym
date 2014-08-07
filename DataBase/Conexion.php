<?php
/**
* Clase encargada de conectarse a base de datos
*/
class Conexion 
{
	private static $servidor=   "localhost";
	private static $usuario=    "root";
	private static $contrasena=  "";
    private static $basededatos= "americangym";

	public function Conectar()
	{
		$conex=mysql_connect(self::$servidor,self::$usuario,self::$contrasena)or die("error al conectarse al servidor ");
		$datos=mysql_select_db(self::$basededatos,$conex)or die("error al seleccionar base de datos");
		return ($conex);
	}
}
?>