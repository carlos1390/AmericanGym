<?php
extract($_POST);
include '../../Datos/Eps/EpsDAO.php';
$eps= new EpsDAO();
//echo $id." ".$nombre." ".$apellido." ".$numerocedula;
$eps->actualizareps($id,$nombre);
header('location:../../Vistas/Eps/index.php');

?>