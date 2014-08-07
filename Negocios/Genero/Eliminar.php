<?php
extract($_GET);
include '../../Datos/Genero/GeneroDao.php';
$Genero= new GeneroDao();
$Genero->BorrarGenero($id);
header('location:../../Vistas/Genero/Index.php');
?>