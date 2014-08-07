<?php
extract($_POST);
include '../../Datos/Ocupacion/OcupacionDAO.php';
$ocupacion= new OcupacionDAO();
//echo $id." ".$nombre." ".$apellido." ".$numerocedula;
$ocupacion->actualizarocupacion($id,$nombre);
header('location:../../Vistas/Ocupacion/index.php');

?>