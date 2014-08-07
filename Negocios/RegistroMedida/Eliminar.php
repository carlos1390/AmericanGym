<?php
include '../../Datos/RegistroMedida/RegistroMedidaDao.php';
$RegistroMedida= new RegistroMedidaDao();

$RegistroMedida->BorrarRegMedida($_GET['id_registro']);
header('location:../../Vistas/RegistroMedida/Index.php');
?>