<?php
require_once  $_SERVER["DOCUMENT_ROOT"].'/AmericanGym//database/dataacces.php';

/**
* 	clase encargada de gestionar un objeto persona
*/

class OcupacionDAO
{
	public $idocupacion;
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
     	    $this->idocupacion[$contador]=$row_db['OCUPACION_ID'];
			$this->nombre[$contador]=$row_db['OCU_NOMBRE'];
            $contador=$contador+1;
		}
	  }
		public	function obteberocupaciones()
		{
			$sql="select * from ocupacion";
			$this->llenardatos($sql);

		}
		public	function obteberocupacion($id)
		{
			$sql="select * from ocupacion where OCUPACION_ID='$id'";
			$this->llenardatos($sql);
		}

       public	function crearocupacion($nombre)
		{
			$sql="insert into ocupacion values(null,'$nombre')";
			$resul=$this->datos->EjecutarConsulta($sql);
              return $resul;		
          }

        public	function actualizarocupacion($id_ocupacion,$nombre)
		{
			$sql="update ocupacion set OCU_NOMBRE='$nombre'
			where  OCUPACION_ID='$id_ocupacion'";
			$resul=$this->datos->EjecutarConsulta($sql);
              return $resul;		
			
		}
        public function borrarocupacion($idocupacion)
        {
        	$sql="delete from ocupacion where OCUPACION_ID='$idocupacion'";
		   $resul=$this->datos->EjecutarConsulta($sql);
           return $resul;
        }

}


?>