<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/DataBase/DataAcces.php';
/**
* Clase encargada de gestionar objetos de tipo Tipo de Documento
*/
class TipoDocumentoDao
{
	public $idtipodocumento;
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
			$this->idtipodocumento[$contador]=$row_db['TIPODOCUMENTO_ID'];
			$this->nombre[$contador]=$row_db['TIP_NOMBRE'];
			$contador=$contador+1;
		}
	}
		public function ObtenerTiposDocumentos()
		{
			$sql="SELECT * FROM tipodocumento";
			$this->LLenardatos($sql);
		}
		public function ObtenerTipoDocumento($id)
		{
			$sql="SELECT * FROM tipodocumento WHERE TIPODOCUMENTO_ID='$id'";
			$this->LLenardatos($sql);
		}
		public function CrearTipoDocumento($NOMBRE){
			$sql="INSERT INTO  tipodocumento values (null,'$NOMBRE')";
			$result=$this->datos->EjecutarConsulta($sql)or die($sql);
			return $result;
		}
		public function ActualizarTipoDocumento($idtipodocumento,$nombre)
		{
			$sql="UPDATE tipodocumento SET TIP_NOMBRE='$nombre' WHERE TIPODOCUMENTO_ID='$idtipodocumento'";
			$resul=$this->datos->EjecutarConsulta($sql)or die($sql);
		}
		public function BorrarTipoDocumento($tipodocumento)
		{
			$sql="DELETE FROM tipodocumento WHERE TIPODOCUMENTO_ID='$tipodocumento'";
			$resul=$this->datos->EjecutarConsulta($sql);
			return $resul;

		}
		





	}

?>