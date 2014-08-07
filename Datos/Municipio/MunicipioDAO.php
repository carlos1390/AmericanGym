<?php
require_once  $_SERVER["DOCUMENT_ROOT"].'/AmericanGym//database/dataacces.php';
/**
* Clase Encargada de gestionar Municipios
*/
class MunicipioDAO 
{
	
    public $idmunicipio;
	public $nombremunicipio;
    public $iddepartamento;
	public $nombredepartamento;
	private $datos;
	private $prueba;
	function __construct()
     {
      $this->datos= new DataAcces();
     }	
     public function llenardatos($sql){
        $this->prueba=$this->datos->ejecutarconsulta($sql);
       $contador=0;
       while ($row_db=$this->datos->recorrerconsulta()) {
     	    $this->idmunicipio[$contador]=$row_db['MUNICIPIO_ID'];
			$this->nombremunicipio[$contador]=$row_db['NOMBRE'];
			$this->iddepartamento[$contador]=$row_db['DEPARTAMENTO_ID'];
            $this->nombredepartamento[$contador]=$row_db['DEP_NOMBRE'];
            $contador=$contador+1;
		}
	  }
		public	function ObtenerMunicipios()
		{	
			$sql="SELECT * FROM `municipio` m,`departamento` d WHERE m.DEPARTAMENTO_ID=d.DEPARTAMENTO_ID ORDER BY  `d`.`DEP_NOMBRE` ASC";
			$this->llenardatos($sql);

		}
		public	function ObtenerMunicipio($id)
		{
			$sql="SELECT * FROM `municipio` m,`departamento` d WHERE m.DEPARTAMENTO_ID=d.DEPARTAMENTO_ID  AND m.`MUNICIPIO_ID`=$id";
			$this->llenardatos($sql);
		}

    public	function CrearMunicipio($id_departamento,$nombre)
		{
			$sql="INSERT INTO  municipio values(null,'$id_departamento','$nombre')";
			$resul=$this->datos->EjecutarConsulta($sql);
              return $resul;		
          }

    public	function ActualizarMunicipio($id_municipio,$id_departamento,$nombre)
		{
			$sql="UPDATE municipio set DEPARTAMENTO_ID='$id_departamento',nombre='$nombre'
			where  MUNICIPIO_ID='$id_municipio'";
			$resul=$this->datos->EjecutarConsulta($sql);
              return $resul;		
			
		}
    public function BorrarMunicipio($id_municipio)
    {
     	$sql="DELETE FROM municipio where MUNICIPIO_ID='$id_municipio'";
		  $resul=$this->datos->EjecutarConsulta($sql);
       return $resul;
    }                   
}
?>