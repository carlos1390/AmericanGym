<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/DataBase/DataAcces.php';
/**
* Clase encargada de gestionar objetos de tipo Usuario
*/
class UsuarioDAO 
{
	public $Numero_documento;
	public $Nombre_usuario;
	public $contrasena;

	
	function __construct()
	{
		$this->datos= new DataAcces();
	}
	public function LLenardatos($sql)
	{
		$this->datos->EjecutarConsulta($sql);
		$contador=0;
		while ($row_db=$this->datos->RecorrerConsulta()) {
			$this->Numero_documento[$contador]=$row_db['NUMERODOCUMENTO'];
			$this->Nombre_usuario[$contador]=$row_db['NOMBREUSUARIO'];
			$this->contrasena[$contador]=$row_db['CONTRASENA'];
			$contador=$contador+1;
		}
	}
	public function ObtenerUser($Name_user,$Password)
	{
		$sql="SELECT * FROM usuario WHERE NOMBREUSUARIO='$Name_user' && CONTRASENA='$Password'";
		$this->LLenardatos($sql);
	}
	public function ContarUsers($Num_docu)
	{
		$sql="SELECT * FROM usuario WHERE NUMERODOCUMENTO='$Num_docu'";
		$this->datos->ejecutarconsulta($sql);
		$countUsers=$this->datos->ContarRegistros();
		return $countUsers;
	}

	public function ValidateUser($Name_user,$Password)
	{
		$sql="SELECT * FROM usuario WHERE NOMBREUSUARIO='$Name_user' && CONTRASENA='$Password'";
		$this->datos->ejecutarconsulta($sql);
		$countUsers=$this->datos->ContarRegistros();
		return $countUsers;
	}
   
	public function CrearUsuariodePersona($id_person,$name_user,$password){
			$sql="INSERT INTO  usuario values ('$id_person','$name_user','$password')";
			$result=$this->datos->EjecutarConsulta($sql)or die($sql);
			return $result;
		}
}
 ?>