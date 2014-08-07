<?php
require_once  $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/database/dataacces.php';

/**
* 	clase encargada de gestionar un objeto persona
*/

class ConceptoCarteraDAO
{
	public $idconceptocartera;
	public $nombre;
	public $totalconcepto;
	private $datos;
	function __construct()
     {
      $this->datos= new DataAcces();
     }	
     public function llenardatos($sql){
       $this->datos->ejecutarconsulta($sql);
       $contador=0;
       while ($row_db=$this->datos->recorrerconsulta()){
     	    $this->idconceptocartera[$contador]=$row_db['CONCEPTO_ID'];
			$this->nombre[$contador]=$row_db['NOMBRE'];
			$this->totalconcepto[$contador]=$row_db['TOTALCONCEPTO'];
            $contador=$contador+1;
		}
	  }
		public	function obteberconceptocarteras()
		{
			$sql="select * from conceptocartera";
			$this->llenardatos($sql);

		}
		public	function obteberconceptocartera($id)
		{
			$sql="select * from conceptocartera where CONCEPTO_ID='$id'";
			$this->llenardatos($sql);
		}

       public	function crearconceptocartera($nombre,$totalconcepto)
		{
			$sql="insert into conceptocartera values(null,'$nombre','$totalconcepto')";
			$resul=$this->datos->EjecutarConsulta($sql);
              return $resul;		
          }

        public	function actualizarconceptocartera($id_conceptocartera,$nombre,$totalconcepto)
		{
			$sql="update conceptocartera set nombre='$nombre',totalconcepto='$totalconcepto'
			where concepto_id='$id_conceptocartera'" or die ($sql);
			$resul=$this->datos->EjecutarConsulta($sql);
              return $resul;		
			
		}
        public function borrarconceptocartera($idconceptocartera)
        {
        	$sql="delete from conceptocartera where CONCEPTO_ID='$idconceptocartera'";
		   $resul=$this->datos->EjecutarConsulta($sql);
           return $resul;
        }

}


?>