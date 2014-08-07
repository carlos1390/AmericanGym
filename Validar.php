<?php 
session_start();
include "Datos/Usuario/UsuarioDAO.php";
include "Datos/Persona/PersonaDAO.php";

$UsuarioTemp= new UsuarioDAO();
$User= new UsuarioDAO();
$PersonaTemp= new PersonaDAO();
$id_perfil;

$usuariotemp=$UsuarioTemp->ValidateUser($_POST['user'],$_POST['password']);
$User->ObtenerUser($_POST['user'],$_POST['password']);
 if ($usuariotemp>0) {
 	for ($i=0; $i <count($User->Numero_documento) ; $i++) {
 		$_SESSION['Numero_documento']=$User->Numero_documento[$i];
 		$_SESSION['usuario']=$User->Nombre_usuario[$i];
	    $_SESSION['contrasena']=$User->contrasena[$i];
 	}
	$PersonaTemp->ObtenerPersona($_SESSION['Numero_documento']);
	for ($i=0; $i <count($PersonaTemp->NumeroDocumento) ; $i++) { 
		$id_perfil=$PersonaTemp->IdPerfil[$i];
	}
	if ($id_perfil==1) {
        header("location:Vistas/Administrador/Index.php");
	}
	else{
        header("location:Vistas/Cliente/Index.php");
	}
 }
 else{
 	header("location:Index.html");
 }
 ?>