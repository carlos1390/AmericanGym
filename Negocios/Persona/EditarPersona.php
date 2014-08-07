<?php
require_once '../../Datos/Persona/PersonaDAO.php';
require_once '../../Images/SimpleImage.php';
$Persona=new PersonaDAO();

$archivo=$_FILES["fotografia"]["tmp_name"];
$destino="../../Fotografias/".$_FILES["fotografia"]["name"];

if ($_FILES["fotografia"]["tmp_name"]!=null) {
   $Persona->ActualizarPersona($_POST['id_persona'],$_POST['name'],$_POST['lastname'],$_POST['id_genero'],$_POST['fecha_nac'],
   	$_POST['direccion'],$_POST['phone_personal'],$_POST['email'],$_POST['municipio'],$_FILES["fotografia"]["name"]);
   move_uploaded_file($archivo,$destino);
   $image = new SimpleImage();
   $image->load($destino);
   $image->resizeToWidth(150);
   $image->save($destino);
   header('location:../../Vistas/Cliente/GestionarPerfil.php');
  }
  else{
  	$Persona->ActualizarPersona($_POST['id_persona'],$_POST['name'],$_POST['lastname'],$_POST['id_genero'],$_POST['fecha_nac'],
   	$_POST['direccion'],$_POST['phone_personal'],$_POST['email'],$_POST['municipio'],$_POST["fotografiaTemp"]);
   header('location:../../Vistas/Cliente/GestionarPerfil.php');
  }
     
 ?>