<?php
extract($_POST);
include '../../Datos/Persona/PersonaDAO.php';
include '../../Datos/Usuario/UsuarioDAO.php';
include '../../Datos/DeficienciasCorporales/DeficienciasCorporalesDao.php';


$Persona= new PersonaDAO();
$Usuario= new UsuarioDAO();
$Deficiencias= new DeficienciasCorporalesDao();

$usuarios=$Usuario->ContarUsers($_GET['id_persona']);
if ($usuarios>0) 
{
	echo "Error. Esta Persona Ya Tiene un Usuario Asociado.";
}
else{
	$Deficiencias->BorrarDeficienciaxPersona($_GET['id_persona']);
	for ($i=0; $i <count($_GET['Deficiencias_Temp']) ; $i++) { 
		$Deficiencias->CrearDeficienciadePersona($_GET['id_persona'],$_GET['Deficiencias_Temp'][$i]);
	}
	$Usuario->CrearUsuariodePersona($_GET['id_persona'],$_GET['name_user'],$_GET['password']);
	echo "Deficiencias Corporales y Usuario, Agregados Exitosamente.";

}
?>