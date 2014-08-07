<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/DataBase/DataAcces.php';
/**
* Clase encargada de gestionar objeto genero
*/
class UnidaddeMedidaDao
{
	public $idunidademedida;
	public $nombre;
	private $datos;
	
	function __construct()
	{
		$this->datos= new DataAcces;
	}

	public function LLenardatos($sql)
	{
		$this->datos->EjecutarConsulta($sql)or die($sql);
		$contador=0;
		while ($row_db=$this->datos->RecorrerConsulta()) {
			$this->idunidademedida[$contador]=$row_db['UNIDAD_ID'];
			$this->nombre[$contador]=$row_db['NOMBRE'];
			$contador=$contador+1;
		}
	}
		public function ObtenerUnidaddeMedidas()
		{
			$sql="SELECT * FROM unidaddemedida";
			$this->LLenardatos($sql);
		}
		public function Obtenerunidaddemedida($id)
		{
			$sql="SELECT * FROM unidaddemedida WHERE UNIDAD_ID='$id'";
			$this->LLenardatos($sql);
		}
		public function CrearUnidaddeMedida($NOMBRE){
			$sql="INSERT INTO  unidaddemedida values (null,'$NOMBRE')";
			$result=$this->datos->EjecutarConsulta($sql)or die($sql);
			return $result;
		}
		public function ActualizarUnidaddeMedida($idunidaddemedida,$nombre)
		{
			$sql="UPDATE unidaddemedida SET nombre='$nombre' WHERE UNIDAD_ID='$idunidaddemedida'";
			$resul=$this->datos->EjecutarConsulta($sql)or die($sql);
		}
		public function BorrarUnidaddeMedida($idunidaddemedida)
		{
			$sql="DELETE FROM unidaddemedida WHERE UNIDAD_ID='$idunidaddemedida'";
			$resul=$this->datos->EjecutarConsulta($sql);
			return $resul;

		}
		





	}

?>