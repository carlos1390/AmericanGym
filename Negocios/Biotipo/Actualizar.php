<?php
extract($_POST);
include '../../Datos/Biotipo/BiotipoDao.php';
$Genero= new BiotipoDao();
$Genero->ActualizarBiotipo($id,$nombre);
header('location:../../Vistas/Biotipo/Index.php');
?>