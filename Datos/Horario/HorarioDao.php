<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/DataBase/DataAcces.php';
/**
* Clase encargada de gestionar objeto genero
*/
class HorarioDao
{
	public $idhorario;
	public $nombre;
	public $hora_inicio;
	public $hora_fin;
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
			$this->idhorario[$contador]=$row_db['HORARIO_ID'];
			$this->nombre[$contador]=$row_db['HOR_NOMBRE'];
			$this->hora_inicio[$contador]=$row_db['HORA_INICIO'];
			$this->hora_fin[$contador]=$row_db['HORA_FIN'];
			$contador=$contador+1;
		}
	}
		public function ObtenerHorarios()
		{
			$sql="SELECT * FROM horario";
			$this->LLenardatos($sql);
		}
		public function ObtenerHorario($id)
		{
			$sql="SELECT * FROM horario WHERE HORARIO_ID='$id'";
			$this->LLenardatos($sql);
		}
		public function CrearHorario($NOMBRE,$HORA_INICIO,$HORA_FIN){
			$sql="INSERT INTO  horario values (null,'$NOMBRE','$HORA_INICIO','$HORA_FIN')";
			$result=$this->datos->EjecutarConsulta($sql)or die($sql);
			return $result;
		}
		public function ActualizarHorario($idhorario,$nombre,$hora_inicio,$hora_fin)
		{
			$sql="UPDATE horario SET HOR_NOMBRE='$nombre',hora_inicio='$hora_inicio',hora_fin='$hora_fin' WHERE HORARIO_ID='$idhorario'";
			$resul=$this->datos->EjecutarConsulta($sql)or die($sql);
		}
		public function BorrarHorario($idhorario)
		{
			$sql="DELETE FROM horario WHERE HORARIO_ID='$idhorario'";
			$resul=$this->datos->EjecutarConsulta($sql);
			return $resul;

		}
		





	}

?>