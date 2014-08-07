<?php
extract ($_POST);
require_once '../../Datos/Persona/PersonaDAO.php';
require_once '../../Images/SimpleImage.php';
$Persona=new PersonaDAO();
$archivo=$_FILES["fotografia"]["tmp_name"];
$destino="../../Fotografias/".$_FILES["fotografia"]["name"];

$tipo= $_FILES['fotografia']['type'];
$tamano= $_FILES['fotografia']['size'];
$tamanoTemp= floor($tamano/1024);
$var="true";
$mensaje="Validacion Exitosa";

switch($var)
{
	case 'true':
    if ($tamanoTemp==0) {
          $mensaje= "Seleccion de Fotografia Obligatoria.";
          break;
    }
		if ($tamanoTemp>1024) {
	        $mensaje= "Tamano de Archivo Maximo (1MB).";
	        break;
        }
        if (!($tipo=="image/jpg" || $tipo=="image/png" || $tipo=="image/jpeg") ) {
        	$mensaje="Tipo de Archivo Invalido";
        }
		break;
		default:
        $mensaje="Validacion Exitosa";
        break;
}
if($mensaje=="Validacion Exitosa"){
   $Persona->CrearPersona($numero_documento,$municipio,$genero,$tipo_documento,$perfil,$eps,$ocupacion,$horario,$biotipo,$nombres,$apellidos,
   $fecha_nac,$direccion,$tel_personal,$tel_acudiente,$estado_civil,$fecha_ing,$objetivo,$_FILES['fotografia']['name'],$email,
   $grupo_sanguineo,$observaciones);
   move_uploaded_file($archivo,$destino);
   $image = new SimpleImage();
   $image->load($destino);
   $image->resizeToWidth(150);
   $image->save($destino);
   header('location:../../Vistas/Persona/Index.php');
}
else{
  header("location:../../Vistas/Persona/GestionarPersona.php?mensaje=$mensaje&number_doc=$numero_documento
    &names=$nombres&lastname=$apellidos&date_nac=$fecha_nac&address=$direccion&phone_personal=$tel_personal
    &phone_friend=$tel_acudiente&date_ing=$fecha_ing&objetive=$objetivo&email_temp=$email&observations=$observaciones");
}
?>