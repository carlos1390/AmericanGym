<?php
require_once  $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/database/dataacces.php';

/**
* 	clase encargada de gestionar un objeto persona
*/

class PerfilDAO
{
	public $idperfil;
	public $nombre;
	public $valor;
	private $datos;
	function __construct()
     {
      $this->datos= new DataAcces();
     }	
     public function llenardatos($sql){
       $this->datos->ejecutarconsulta($sql);
       $contador=0;
       while ($row_db=$this->datos->recorrerconsulta()){
     	    $this->idperfil[$contador]=$row_db['PERFIL_ID'];
			$this->nombre[$contador]=$row_db['PER_NOMBRE'];
			$this->valor[$contador]=$row_db['VALOR'];
            $contador=$contador+1;
		}
	  }
		public	function obteberperfiles()
		{
			$sql="select * from perfil";
			$this->llenardatos($sql);

		}
		public	function obteberperfil($id)
		{
			$sql="select * from perfil where PERFIL_ID='$id'";
			$this->llenardatos($sql);
		}

       public	function crearperfil($nombre,$valor)
		{
			$sql="insert into perfil values(null,'$nombre','$valor')";
			$resul=$this->datos->EjecutarConsulta($sql);
              return $resul;		
          }

        public	function actualizarperfil($id_perfil,$nombre,$valor)
		{
			$sql="update perfil set PER_NOMBRE='$nombre',valor='$valor'
			where perfil_id='$id_perfil'";
			$resul=$this->datos->EjecutarConsulta($sql);
              return $resul;		
			
		}
        public function borrarperfil($idperfil)
        {
        	$sql="delete from perfil where perfil_id='$idperfil'";
		   $resul=$this->datos->EjecutarConsulta($sql);
           return $resul;
        }

}


?>