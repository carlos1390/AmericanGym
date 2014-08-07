<?php
extract($_POST);
include '../../Datos/Biotipo/BiotipoDao.php';
$Biotipo= new BiotipoDao();
$Biotipo->CrearBiotipo($nombre);
header('location:../../Vistas/Biotipo/Index.php');


?>