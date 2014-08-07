<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/DataBase/DataAcces.php';
/**
* Clase encargada de gestionar objeto Deficiencia
*/
class DeficienciasCorporalesDao
{
	public $iddeficiencia;
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
			$this->iddeficiencia[$contador]=$row_db['DEFICIENCIA_ID'];
			$this->nombre[$contador]=$row_db['NOMBRE'];
			$contador=$contador+1;
		}
	}
		public function ObtenerDeficiencias()
		{
			$sql="SELECT * FROM deficienciascorporales";
			$this->LLenardatos($sql);
		}
		public function ObtenerDeficiencia($id)
		{
			$sql="SELECT * FROM deficienciascorporales WHERE DEFICIENCIA_ID='$id'";
			$this->LLenardatos($sql);
		}
		public function CrearDeficiencia($NOMBRE){
			$sql="INSERT INTO  deficienciascorporales values (null,'$NOMBRE')";
			$result=$this->datos->EjecutarConsulta($sql)or die($sql);
			return $result;
		}
		public function CrearDeficienciadePersona($id_person,$id_deficiencia){
			$sql="INSERT INTO  deficienciasdepersona values ('$id_person','$id_deficiencia')";
			$result=$this->datos->EjecutarConsulta($sql)or die($sql);
			return $result;
		}
		public function ActualizarDeficiencia($iddeficiencia,$nombre)
		{
			$sql="UPDATE deficienciascorporales SET nombre='$nombre' WHERE DEFICIENCIA_ID='$iddeficiencia'";
			$resul=$this->datos->EjecutarConsulta($sql)or die($sql);
		}
		public function BorrarDeficiencia($iddeficiencia)
		{
			$sql="DELETE FROM deficienciascorporales WHERE DEFICIENCIA_ID='$iddeficiencia'";
			$resul=$this->datos->EjecutarConsulta($sql)or die("error ");
			return $resul;

		}
		public function BorrarDeficienciaxPersona($id_person)
		{
			$sql="DELETE FROM deficienciasdepersona WHERE NUMERODOCUMENTO='$id_person'";
			$resul=$this->datos->EjecutarConsulta($sql)or die("error");
			return $resul;

		}
		public function CountDeficiencia_person($Num_docu)
	    {
		  $sql="SELECT * FROM deficienciasdepersona WHERE NUMERODOCUMENTO='$Num_docu'";
		  $this->datos->ejecutarconsulta($sql);
		  $countDeficiencias=$this->datos->ContarRegistros();
		  return $countDeficiencias;
	    }





	}

?>