<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/DataBase/DataAcces.php';
/**
* Clase encargada de gestionar objeto genero
*/
class BiotipoDao
{
	public $idbiotipo;
	public $nombre;
	private $datos;
	
	function __construct()
	{
		$this->datos= new DataAcces;
	}

	public function LLenardatos($sql)
	{
		$this->datos->EjecutarConsulta($sql);
		$contador=0;
		while ($row_db=$this->datos->RecorrerConsulta()) {
			$this->idbiotipo[$contador]=$row_db['BIOTIPO_ID'];
			$this->nombre[$contador]=$row_db['BIO_NOMBRE'];
			$contador=$contador+1;
		}
	}
		public function ObtenerBiotipos()
		{
			$sql="SELECT * FROM biotipo";
			$this->LLenardatos($sql);
		}
		public function ObtenerBiotipo($id)
		{
			$sql="SELECT * FROM biotipo WHERE BIOTIPO_ID='$id'";
			$this->LLenardatos($sql);
		}
		public function CrearBiotipo($NOMBRE){
			$sql="INSERT INTO  biotipo values (null,'$NOMBRE')";
			$result=$this->datos->EjecutarConsulta($sql)or die($sql);
			return $result;
		}
		public function ActualizarBiotipo($idbiotipo,$nombre)
		{
			$sql="UPDATE biotipo SET BIO_NOMBRE='$nombre' WHERE BIOTIPO_ID='$idbiotipo'";
			$resul=$this->datos->EjecutarConsulta($sql)or die($sql);
		}
		public function BorrarBiotipo($idbiotipo)
		{
			$sql="DELETE FROM biotipo WHERE BIOTIPO_ID='$idbiotipo'";
			$resul=$this->datos->EjecutarConsulta($sql);
			return $resul;

		}
		





	}

?>