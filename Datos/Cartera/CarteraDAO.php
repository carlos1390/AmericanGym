<?php
require_once  $_SERVER["DOCUMENT_ROOT"].'/AmericanGym//database/dataacces.php';
/**
* Clase Encargada de gestionar Municipios
*/
class CarteraDAO 
{
	
    public $id_cartera;
	public $concepto_id;
    public $concepto_nombre;
    public $numero_documento;
    public $fecha_cartera;
    public $abono;
    public $saldo;

    private $datos;
	
	function __construct()
	{
      $this->datos= new DataAcces();
	}

		
     public function llenardatos($sql){
        $this->prueba=$this->datos->ejecutarconsulta($sql);
       $contador=0;
       while ($row_db=$this->datos->recorrerconsulta()) {
     	    $this->id_cartera[$contador]=$row_db['CARTERA_ID'];
			$this->concepto_id[$contador]=$row_db['CONCEPTO_ID'];
            $this->concepto_nombre[$contador]=$row_db['NOMBRE'];
			$this->numero_documento[$contador]=$row_db['NUMERODOCUMENTO'];
            $this->fecha_cartera[$contador]=$row_db['FECHACARTERA'];
            $this->abono[$contador]=$row_db['ABONO'];
            $this->saldo[$contador]=$row_db['SALDO'];
            $contador=$contador+1;
		}
	  }
		public	function ObtenerCarteras()
		{	
			$sql="SELECT * FROM `cartera` a,`conceptocartera` c WHERE a.CONCEPTO_ID=c.CONCEPTO_ID ORDER BY  `c`.`NOMBRE` ASC";
			$this->llenardatos($sql);

		}
		public	function ObtenerCartera($id)
		{
			$sql="SELECT * FROM `cartera` m,`concepto` d WHERE m.CONCEPTO_ID=d.CONCEPTO_ID  AND m.`CARTERA_ID`=$id";
			$this->llenardatos($sql);
		}

    public	function CrearCartera($id_concepto,$id_persona,$fechacartera,$abono,$saldo)
		{
			$sql="INSERT INTO  cartera values(null,'$id_concepto','$id_persona','$fechacartera','$abono','$saldo')";
			$resul=$this->datos->EjecutarConsulta($sql)or die($sql);
              return $resul;		
          }

    public	function ActualizarCartera($id_cartera,$id_concepto,$nombre)
		{
			$sql="UPDATE cartera set CONCEPTO_ID='$id_concepto',nombre='$nombre'
			where  CARTERA_ID='$id_cartera'";
			$resul=$this->datos->EjecutarConsulta($sql);
              return $resul;		
			
		}
    public function BorrarCartera($id_cartera)
    {
     	$sql="DELETE FROM cartera where CARTERA_ID='$id_cartera'";
		  $resul=$this->datos->EjecutarConsulta($sql);
       return $resul;
    }

    public function CountPersonsinCartera($Num_docu)
	{
		$sql="SELECT * FROM cartera WHERE NUMERODOCUMENTO='$Num_docu'";
		$this->datos->ejecutarconsulta($sql);
		$countCarteras=$this->datos->ContarRegistros();
		return $countCarteras;
	}                   
}
?>