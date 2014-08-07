<?php
include'conexion.php';

/**
* Clase encargada de comunicarse con la base de datos
*/
class DataAcces 
{
     private  $conexion;
     private  $resultado;
     private  $fila_db;	
	function __construct()
	{
		$this->conexion= new conexion();
	}

	public function EjecutarConsulta($sql)
	{
		$this->resultado=mysql_query($sql,$this->conexion->Conectar());
		mysql_close($this->conexion->Conectar());
		return($this->resultado);
	}
	public function RecorrerConsulta()
	{
		$this->fila_db=mysql_fetch_array(($this->resultado));
		return($this->fila_db);
	}
	public function ContarRegistros()
	{
		$this->cantidad=mysql_num_rows($this->resultado);
        return($this->cantidad);
	}
	public function __destruct()
	{
		$this->conexion=0;
	}

}
?>