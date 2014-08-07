<?php
extract($_POST);
include '../../Datos/Genero/GeneroDao.php';
$Genero= new GeneroDao();
$Genero->CrearGenero($nombre);
header('location:../../Vistas/Genero/Index.php');
?>