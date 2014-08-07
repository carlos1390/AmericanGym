<?php
extract($_POST);
include '../../Datos/Departamento/DepartamentoDAO.php';
$departamento= new DepartamentoDAO();
//echo $id." ".$nombre." ".$apellido." ".$numerocedula;
$departamento->actualizardepartamento($id,$nombre);
header('location:../../Vistas/Departamento/index.php');

?>