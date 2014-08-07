<?php

include '../../Datos/Persona/PersonaDAO.php';
include '../../Datos/Usuario/UsuarioDAO.php';
include '../../Datos/Cartera/CarteraDAO.php';
include '../../Datos/DeficienciasCorporales/DeficienciasCorporalesDao.php';
include '../../Datos/RegistroMedida/RegistroMedidaDao.php';

$Persona= new PersonaDAO();
$Usuario= new UsuarioDAO();
$Cartera = new CarteraDAO();
$Deficiencia= new DeficienciasCorporalesDao();
$Registro_Medida= new RegistroMedidaDao();	

$usuarios=$Usuario->ContarUsers($_GET['idpersona']);
$carteras=$Cartera->CountPersonsinCartera($_GET['idpersona']);
$deficiencia=$Deficiencia->CountDeficiencia_person($_GET['idpersona']);
$registro= $Registro_Medida->ContarMedidas_Usuario($_GET['idpersona']);
if ($usuarios>0) 
{
	echo "Error. Eliminar dependencias de 'Usuario' primero.";
}
elseif ($carteras>0) {
	echo "Error. Eliminar dependencias de 'Cartera' primero.";
}
elseif ($deficiencia>0) {
	echo "Error. Eliminar dependencias de 'Deficiencias de Persona' primero.";
}
elseif ($registro>0) {
	echo "Error. Eliminar dependencias de 'Registros de Medida' primero.";
}
else
{
	if ($Persona->BorrarPersona($_GET['idpersona'])==true) {
		echo "Registro eliminado correctamente";
	}
	else{
		echo "Error. Inesperado";
	}
}

?>