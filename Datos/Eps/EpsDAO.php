<?php
require_once  $_SERVER["DOCUMENT_ROOT"].'/AmericanGym//database/dataacces.php';

/**
* 	clase encargada de gestionar un objeto persona
*/

class EpsDAO
{
	public $ideps;
	public $nombre;
	private $datos;
	function __construct()
     {
      $this->datos= new DataAcces();
     }	
     public function llenardatos($sql){
       $this->datos->ejecutarconsulta($sql);
       $contador=0;
       while ($row_db=$this->datos->recorrerconsulta()){
     	    $this->ideps[$contador]=$row_db['EPS_ID'];
			$this->nombre[$contador]=$row_db['EPS_NOMBRE'];
            $contador=$contador+1;
		}
	  }
		public	function obteberepss()
		{
			$sql="select * from eps";
			$this->llenardatos($sql);

		}
		public	function obtebereps($id)
		{
			$sql="select * from eps where EPS_ID='$id'";
			$this->llenardatos($sql);
		}

       public	function creareps($nombre)
		{
			$sql="insert into eps values(null,'$nombre')";
			$resul=$this->datos->EjecutarConsulta($sql);
              return $resul;		
          }

        public	function actualizareps($id_eps,$nombre)
		{
			$sql="update eps set EPS_NOMBRE='$nombre'
			where  EPS_ID='$id_eps'";
			$resul=$this->datos->EjecutarConsulta($sql);
              return $resul;		
			
		}
        public function borrareps($ideps)
        {
        	$sql="delete from eps where EPS_ID='$ideps'";
		   $resul=$this->datos->EjecutarConsulta($sql);
           return $resul;
        }

}


?>