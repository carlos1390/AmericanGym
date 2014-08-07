<?php
extract ($_POST);
require_once  $_SERVER["DOCUMENT_ROOT"].'/AmericanGym/Datos/Perfil/PerfilDAO.php';
$perfil=new PerfilDAO();
$perfil->crearperfil($nombre,$valor);
header('location:../../Vistas/Perfil/index.php');

?>