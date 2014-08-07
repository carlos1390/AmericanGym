<?php
extract($_GET);
include '../../Datos/Biotipo/BiotipoDao.php';
$Genero= new BiotipoDao();
$Genero->BorrarBiotipo($id);
header('location:../../Vistas/Biotipo/Index.php');
?>