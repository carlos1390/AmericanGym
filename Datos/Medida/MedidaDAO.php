<?php 
require_once $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/DataBase/DataAcces.php';


class MedidaDAO
{
	public $id_medida;
	public $id_unidad;
	public $nombre_medida;
	public $nombre_unidad;
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
			$this->id_medida[$contador]=$row_db['MEDIDA_ID'];
			$this->id_unidad[$contador]=$row_db['UNIDAD_ID'];
			$this->nombre_medida[$contador]=$row_db['MEDIDA_NOMBRE'];
			$this->nombre_unidad[$contador]=$row_db['NOMBRE'];
			$contador=$contador+1;
		}
	}
		public function ObtenerMedidas()
		{
			$sql="SELECT MEDIDA_ID,u.UNIDAD_ID,MEDIDA_NOMBRE,NOMBRE  FROM medida m,unidaddemedida u WHERE m.UNIDAD_ID=u.UNIDAD_ID ";
			$this->LLenardatos($sql);
		}
		public function ObtenerMedida($id_medida)
		{
			$sql="SELECT m.MEDIDA_ID,u.UNIDAD_ID,MEDIDA_NOMBRE,NOMBRE  FROM medida m,unidaddemedida u WHERE m.UNIDAD_ID=u.UNIDAD_ID 
			 AND MEDIDA_ID='$id_medida'";
			$this->LLenardatos($sql);
		}
		public function CrearMedida($id_unidad,$nombre)
		{
			$sql="INSERT INTO medida values (null,'$id_unidad','$nombre')";
			$result=$this->datos->EjecutarConsulta($sql);
			return $result;
		}
		public function ActualizarMedida($id_medida,$id_unidad,$nombre)
		{
			$sql="UPDATE medida SET MEDIDA_NOMBRE='$nombre',UNIDAD_ID='$id_unidad' WHERE MEDIDA_ID='$id_medida'";
			$resul=$this->datos->EjecutarConsulta($sql)or die($sql);
		}
		public function BorrarMedida($id_medida)
		{
			$sql="DELETE FROM medida WHERE MEDIDA_ID='$id_medida'";
			$resul=$this->datos->EjecutarConsulta($sql);
			return $resul;

		}
	}
 ?>