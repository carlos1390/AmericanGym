<?php
extract($_POST);
include '../../Datos/Genero/GeneroDao.php';
$Genero= new GeneroDao();
$Genero->ActualizarGenero($id,$nombre);
header('location:../../Vistas/Genero/Index.php');
?>