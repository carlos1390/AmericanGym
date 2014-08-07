<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/DataBase/DataAcces.php';
/**
* Clase encargada de gestionar objeto Registro de medidas
*/
class RegistroMedidaDao
{
	public $Id_RegistroMedida;
	public $Fecha_medida;
	public $Nombres_persona;
	public $Apellidos_persona;
	public $nombremedida;
	public $valor;
	public $Unidad_medida;
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
			$this->Id_RegistroMedida[$contador]=$row_db['REGISTRO_ID'];
			$this->Fecha_medida[$contador]=$row_db['FECHA'];
			$this->Nombres_persona[$contador]=$row_db['NOMBRES'];
			$this->Apellidos_persona[$contador]=$row_db['APELLIDOS'];
			$this->nombremedida[$contador]=$row_db['MEDIDA_NOMBRE'];
			$this->valor[$contador]=$row_db['VALOR'];
			$this->Unidad_medida[$contador]=$row_db['NOMBRE'];
			$contador=$contador+1;
		}
	}

	public function LLenardatosTemp($sql)
	{
		$this->datos->EjecutarConsulta($sql);
		$contador=0;
		while ($row_db=$this->datos->RecorrerConsulta()) {
			$this->idregistromedida[$contador]=$row_db['REGISTRO_ID'];
            $this->fecha[$contador]=$row_db['FECHA'];
			$this->idunidad[$contador]=$row_db['UNIDAD_ID'];
			$this->nombreunidad[$contador]=$row_db['NOMBRE'];
			$this->numerodocumento[$contador]=$row_db['NUMERODOCUMENTO'];
			$this->valor[$contador]=$row_db['VALOR'];
			$this->nombremedida[$contador]=$row_db['MEDIDA_NOMBRE'];
			$contador=$contador+1;
		}
	}

		public function ObtenerRegMedidas()
		{
			$sql="SELECT REGISTRO_ID,FECHA,NOMBRES,APELLIDOS,MEDIDA_NOMBRE,VALOR,NOMBRE FROM registrodemedida r,medida m,persona p,
			unidaddemedida u WHERE r.medida_id=m.medida_id and r.numerodocumento=p.numerodocumento and u.unidad_id=m.unidad_id";
			$this->LLenardatos($sql);
		}
		public function ObtenerRegMedida($id)
		{
			$sql="SELECT * FROM registrodemedida WHERE GENERO_ID='$id'";
			$this->LLenardatos($sql);
		}
		public function ObtenerRegistrosdeMedida($numerodocumento,$id_medida)
		{
			$sql="SELECT r.REGISTRO_ID,r.FECHA,u.UNIDAD_ID,u.NOMBRE,p.NUMERODOCUMENTO,r.VALOR,m.MEDIDA_NOMBRE
            FROM registrodemedida r,unidaddemedida u,persona p, medida m 
            WHERE u.UNIDAD_ID=m.UNIDAD_ID and p.NUMERODOCUMENTO=r.NUMERODOCUMENTO and
			p.NUMERODOCUMENTO='$numerodocumento' and m.MEDIDA_ID='$id_medida'";
			$this->LLenardatosTemp($sql);
		}
		public function CrearRegMedida($Fecha_medida,$id_persona,$id_medida,$valor){
			$sql="INSERT INTO  registrodemedida values (null,'$Fecha_medida','$id_persona','$id_medida','$valor')";
			$result=$this->datos->EjecutarConsulta($sql)or die($sql);
			return $result;
		}
		public function ActualizarRegMedida($idgenero,$nombre)
		{
			$sql="UPDATE registrodemedida SET nombre='$nombre' WHERE GENERO_ID='$idgenero'";
			$resul=$this->datos->EjecutarConsulta($sql)or die($sql);
		}
		public function BorrarRegMedida($Id_RegistroMedida)
		{
			$sql="DELETE  FROM registrodemedida  WHERE REGISTRO_ID='$Id_RegistroMedida'";
			$resul=$this->datos->EjecutarConsulta($sql);
		}
		public function ContarMedidas_Usuario($Num_docu)
	   {
		 $sql="SELECT * FROM registrodemedida WHERE NUMERODOCUMENTO='$Num_docu'";
		 $this->datos->ejecutarconsulta($sql);
		 $countRegistros=$this->datos->ContarRegistros();
		 return $countRegistros;
	   }
	}

?>