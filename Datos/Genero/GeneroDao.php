<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/DataBase/DataAcces.php';
/**
* Clase encargada de gestionar objeto genero
*/
class GeneroDao
{
	public $idgenero;
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
			$this->idgenero[$contador]=$row_db['GENERO_ID'];
			$this->nombre[$contador]=$row_db['GEN_NOMBRE'];
			$contador=$contador+1;
		}
	}
		public function ObtenerGeneros()
		{
			$sql="SELECT * FROM genero";
			$this->LLenardatos($sql);
		}
		public function Obtenergenero($id)
		{
			$sql="SELECT * FROM genero WHERE GENERO_ID='$id'";
			$this->LLenardatos($sql);
		}
		public function CrearGenero($NOMBRE){
			$sql="INSERT INTO  genero values (null,'$NOMBRE')";
			$result=$this->datos->EjecutarConsulta($sql)or die($sql);
			return $result;
		}
		public function ActualizarGenero($idgenero,$nombre)
		{
			$sql="UPDATE genero SET gen_nombre='$nombre' WHERE GENERO_ID='$idgenero'";
			$resul=$this->datos->EjecutarConsulta($sql)or die($sql);
		}
		public function BorrarGenero($idgenero)
		{
			$sql="DELETE FROM genero WHERE GENERO_ID='$idgenero'";
			$resul=$this->datos->EjecutarConsulta($sql);
			return $resul;

		}
	}

?>