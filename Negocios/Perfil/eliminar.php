<?php
extract($_GET);
include '../../Datos/Perfil/PerfilDAO.php';
$perfil = new PerfilDAO();
$perfil->borrarperfil($id);
header('location:../../Vistas/Perfil/index.php');

?>