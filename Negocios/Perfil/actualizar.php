<?php
extract($_POST);
include '../../Datos/Perfil/PerfilDAO.php';
$perfil= new PerfilDAO();
//echo $id." ".$nombre." ".$apellido." ".$numerocedula;
$perfil->actualizarperfil($id,$nombre,$valor);
header('location:../../Vistas/Perfil/index.php');

?>