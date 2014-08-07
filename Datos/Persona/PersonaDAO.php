<?php
require_once  $_SERVER["DOCUMENT_ROOT"].'/AmericanGym//database/dataacces.php';
/**
* Clase Encargada de gestionar Objetos de Tipo Persona
*/
class PersonaDAO 
{
	
  public $NumeroDocumento;
  public $IdMunicipio;
	public $NombreMunicipio;
  public $IdGenero;
	public $NombreGenero;
	public $IdTipoDocumento;
	public $NombreTipoDocumento;
	public $IdPerfil;
	public $NombrePerfil;
	public $IdEps;
	public $NombreEps;
	public $IdOcupacion;
	public $NombreOcupacion;
	public $IdHorario;
	public $NombreHorario;
	public $IdBiotipo;
	public $NombreBiotipo;
	public $Nombres;
	public $Apellidos;
  public $FechaNacimiento;
  public $Direccion;
  public $Telpersonal;
  public $TelAcudiente;
  public $EstadoCivil;
  public $FechaIngreso;
  public $Objetivo;
  public $Fotografia;
  public $Email;
  public $GrupoSanguineo;
  public $Observaciones;
	private $datos;
	function __construct()
     {
      $this->datos= new DataAcces();
     }	
     public function llenardatos($sql){
        $this->datos->ejecutarconsulta($sql);
        $contador=0;
       while ($row_db=$this->datos->recorrerconsulta()) {
     	      $this->NumeroDocumento[$contador]=$row_db['NUMERODOCUMENTO'];
			      $this->IdMunicipio[$contador]=$row_db['MUNICIPIO_ID'];
		      	$this->NombreMunicipio[$contador]=$row_db['NOMBRE'];
            $this->IdGenero[$contador]=$row_db['GENERO_ID'];
            $this->NombreGenero[$contador]=$row_db['GEN_NOMBRE'];
            $this->IdTipoDocumento[$contador]=$row_db['TIPODOCUMENTO_ID'];
            $this->NombreTipoDocumento[$contador]=$row_db['TIP_NOMBRE'];
            $this->IdPerfil[$contador]=$row_db['PERFIL_ID'];
            $this->NombrePerfil[$contador]=$row_db['PER_NOMBRE'];
            $this->IdEps[$contador]=$row_db['EPS_ID'];
            $this->NombreEps[$contador]=$row_db['EPS_NOMBRE'];
            $this->IdOcupacion[$contador]=$row_db['OCUPACION_ID'];
            $this->NombreOcupacion[$contador]=$row_db['OCU_NOMBRE'];
            $this->IdHorario[$contador]=$row_db['HORARIO_ID'];
            $this->NombreHorario[$contador]=$row_db['HOR_NOMBRE'];
            $this->IdBiotipo[$contador]=$row_db['BIOTIPO_ID'];
            $this->NombreBiotipo[$contador]=$row_db['BIO_NOMBRE'];
            $this->Nombres[$contador]=$row_db['NOMBRES'];
            $this->Apellidos[$contador]=$row_db['APELLIDOS'];
            $this->FechaNacimiento[$contador]=$row_db['FECHA_NACIMIENTO'];
            $this->Direccion[$contador]=$row_db['DIRECCION'];
            $this->Telpersonal[$contador]=$row_db['TELEFONOPERSONAL'];
            $this->TelAcudiente[$contador]=$row_db['TELEFONOACUDIENTE'];
            $this->EstadoCivil[$contador]=$row_db['ESTADOCIVIL'];
            $this->FechaIngreso[$contador]=$row_db['FECHA_INGRESO'];
            $this->Objetivo[$contador]=$row_db['OBJETIVO'];
            $this->Fotografia[$contador]=$row_db['FOTOGRAFIA'];
            $this->Email[$contador]=$row_db['CORREOELECTRONICO'];
            $this->GrupoSanguineo[$contador]=$row_db['GRUPOSANGUINEO'];
            $this->Observaciones[$contador]=$row_db['OBSERVACIONES'];
            $contador=$contador+1;
		}
	  }
		public	function ObtenerPersonas()
		{	
			$sql="SELECT p.NUMERODOCUMENTO,m.MUNICIPIO_ID,m.NOMBRE,g.GENERO_ID,g.GEN_NOMBRE,t.TIPODOCUMENTO_ID,t.TIP_NOMBRE,per.PERFIL_ID,
			per.PER_NOMBRE,e.EPS_ID,e.EPS_NOMBRE,o.OCUPACION_ID,o.OCU_NOMBRE,h.HORARIO_ID,h.HOR_NOMBRE,b.BIOTIPO_ID,b.BIO_NOMBRE,p.NOMBRES,
			p.APELLIDOS,p.FECHA_NACIMIENTO,p.DIRECCION,p.TELEFONOPERSONAL,p.TELEFONOACUDIENTE,p.ESTADOCIVIL,p.FECHA_INGRESO,p.OBJETIVO,
			p.FOTOGRAFIA,p.CORREOELECTRONICO,p.GRUPOSANGUINEO,p.OBSERVACIONES
			 FROM `municipio` m,`genero` g,`tipodocumento` t,`perfil` per,`eps` e,`ocupacion` o,`horario` h,`biotipo` b,
			`persona` p  WHERE p.MUNICIPIO_ID=m.MUNICIPIO_ID AND p.GENERO_ID=g.GENERO_ID AND p.TIPODOCUMENTO_ID=t.TIPODOCUMENTO_ID AND
			p.PERFIL_ID=per.PERFIL_ID AND p.EPS_ID=e.EPS_ID AND p.OCUPACION_ID=o.OCUPACION_ID AND p.HORARIO_ID=h.HORARIO_ID AND p.BIOTIPO_ID=b.BIOTIPO_ID
			 ";
			$this->llenardatos($sql);

		}
		public	function ObtenerPersona($id_persona)
		{
			$sql="SELECT p.NUMERODOCUMENTO,m.MUNICIPIO_ID,m.NOMBRE,g.GENERO_ID,g.GEN_NOMBRE,
      t.TIPODOCUMENTO_ID,t.TIP_NOMBRE,per.PERFIL_ID, per.PER_NOMBRE,e.EPS_ID,e.EPS_NOMBRE,
      o.OCUPACION_ID,o.OCU_NOMBRE,h.HORARIO_ID,h.HOR_NOMBRE,b.BIOTIPO_ID,b.BIO_NOMBRE,p.NOMBRES,
      p.APELLIDOS,p.FECHA_NACIMIENTO,p.DIRECCION,p.TELEFONOPERSONAL,p.TELEFONOACUDIENTE,p.ESTADOCIVIL,
      p.FECHA_INGRESO,p.OBJETIVO,p.FOTOGRAFIA, p.CORREOELECTRONICO,p.GRUPOSANGUINEO,p.OBSERVACIONES FROM `municipio` m,
      `genero` g,`tipodocumento` t,`perfil` per,`eps` e,`ocupacion` o,`horario` h,`biotipo` b, `persona` p 
      WHERE p.MUNICIPIO_ID=m.MUNICIPIO_ID AND p.GENERO_ID=g.GENERO_ID AND p.TIPODOCUMENTO_ID=t.TIPODOCUMENTO_ID 
      AND p.PERFIL_ID=per.PERFIL_ID AND p.EPS_ID=e.EPS_ID AND p.OCUPACION_ID=o.OCUPACION_ID AND p.HORARIO_ID=h.HORARIO_ID 
      AND p.BIOTIPO_ID=b.BIOTIPO_ID AND P.NUMERODOCUMENTO='$id_persona'";
			$this->llenardatos($sql);
		}

       public	function CrearPersona($numero_docu,$id_muni,$id_genero,$id_tipodocu,$id_perfil,$id_eps,$id_ocupacion,$id_horario,
             	$id_biotipo,$nombres,$apellidos,$fecha_nac,$direccion,$tel_personal,$tel_acudiente,$estado_civil,
             	$fecha_ing,$objetivo,$foto,$email,$grupo_san,$observaciones)
		{
			$sql="INSERT INTO  persona values('$numero_docu',$id_muni,$id_genero,$id_tipodocu,$id_perfil,$id_eps,$id_ocupacion,$id_horario,
				$id_biotipo,'$nombres','$apellidos','$fecha_nac','$direccion','$tel_personal','$tel_acudiente','$estado_civil','$fecha_ing',
				'$objetivo','$foto','$email','$grupo_san','$observaciones')";
			$resul=$this->datos->EjecutarConsulta($sql);
              return $resul;		
          }

   public	function ActualizarPersona($id_persona,$nombres,$apellidos,$id_genero,$fecha_nac,
    $direccion,$tel_personal,$email,$id_municipio,$fotografia)
		{
			$sql="UPDATE persona set NOMBRES='$nombres',APELLIDOS='$apellidos',GENERO_ID='$id_genero',FECHA_NACIMIENTO='$fecha_nac',
            DIRECCION='$direccion',TELEFONOPERSONAL='$tel_personal',CORREOELECTRONICO='$email',MUNICIPIO_ID='$id_municipio',
            FOTOGRAFIA='$fotografia' where  NUMERODOCUMENTO=$id_persona";
			      $resul=$this->datos->EjecutarConsulta($sql);
            return $resul;		
		}
        public function BorrarPersona($numero_docu)
        {
        	$sql="DELETE FROM persona where NUMERODOCUMENTO='$numero_docu'";
		      $resul=$this->datos->EjecutarConsulta($sql)or die($sql);
           return $resul;
        }
}
?>