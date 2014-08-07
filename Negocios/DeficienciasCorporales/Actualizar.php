<?php
extract($_POST);
include '../../Datos/DeficienciasCorporales/DeficienciasCorporalesDao.php';
$Genero= new DeficienciasCorporalesDao();
$Genero->ActualizarDeficiencia($id,$nombre);
header('location:../../Vistas/DeficienciasCorporales/Index.php');
?>