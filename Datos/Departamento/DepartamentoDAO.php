<?php
require_once  $_SERVER["DOCUMENT_ROOT"].'/AmericanGym//database/dataacces.php';

/**
* 	clase encargada de gestionar un objeto persona
*/

class DepartamentoDAO
{
	public $iddepartamento;
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
     	    $this->iddepartamento[$contador]=$row_db['DEPARTAMENTO_ID'];
			$this->nombre[$contador]=$row_db['DEP_NOMBRE'];
            $contador=$contador+1;
		}
	  }
		public	function obteberdepartamentos()
		{
			$sql="select * from departamento";
			$this->llenardatos($sql);

		}
		public	function obteberdepartamento($id)
		{
			$sql="select * from departamento where DEPARTAMENTO_ID='$id'";
			$this->llenardatos($sql);
		}

       public	function creardepartamento($nombre)
		{
			$sql="insert into departamento values(null,'$nombre')";
			$resul=$this->datos->EjecutarConsulta($sql);
              return $resul;		
          }

        public	function actualizardepartamento($id_departamento,$nombre)
		{
			$sql="update departamento set dep_nombre='$nombre'
			where  DEPARTAMENTO_ID='$id_departamento'";
			$resul=$this->datos->EjecutarConsulta($sql);
              return $resul;		
			
		}
        public function borrardepartamento($iddepartamento)
        {
        	$sql="delete from departamento where DEPARTAMENTO_ID='$iddepartamento'";
		   $resul=$this->datos->EjecutarConsulta($sql);
           return $resul;
        }

}


?>