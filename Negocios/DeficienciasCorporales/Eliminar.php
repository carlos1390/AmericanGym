<?php
extract($_GET);
include '../../Datos/DeficienciasCorporales/DeficienciasCorporalesDao.php';
$Genero= new DeficienciasCorporalesDao();
$Genero->BorrarDeficiencia($id);
header('location:../../Vistas/DeficienciasCorporales/Index.php');
?>